<?php

namespace Development\PHPMd\Rules;

use PHPMD\AbstractNode;
use PHPMD\AbstractRule;
use PHPMD\Rule\ClassAware;

class DisallowCrossLayerInstances extends AbstractRule implements ClassAware
{
    public function apply(AbstractNode $node)
    {
        $namespace = $node->getNamespaceName();

        if (!preg_match('/App\\\\Application\\\\/', $namespace)) {
            return;
        }

        $classOrInterfaceReference = $node->findChildrenOfType('ClassOrInterfaceReference');

        foreach ($classOrInterfaceReference as $classUsage) {
            $fullClassName = $classUsage->getNode()->getImage();
            if (!preg_match('/\\\\App\\\\Infrastructure\\\\/', $fullClassName)) {
                continue;
            }

            $this->addViolation(
                $node,
                [
                    sprintf(
                        'The method %s uses cross layer instance %s',
                        $node->getName(),
                        $fullClassName,
                    ),
                ],
            );
        }

    }
}
