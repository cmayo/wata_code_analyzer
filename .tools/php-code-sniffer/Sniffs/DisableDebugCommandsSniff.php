<?php

namespace Development\PHPCodeSniffer\Sniffs;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

class DisableDebugCommandsSniff implements Sniff
{
    public function register()
    {
        return [T_EXIT];
    }

    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $error = 'Die or Exit usage is prohibited; found %s';
        $data  = array(trim($tokens[$stackPtr]['content']));
        $phpcsFile->addError($error, $stackPtr, 'Found', $data);
    }
}
