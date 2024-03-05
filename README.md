# Outside-in TDD

We want to build a todo-list application

AC1

- As a User
- I want to add a task to my todo-list
- So I will have a new pending task

AC2

- As a User
- I want to get all tasks from my todo-list
- So I can see all my tasks and the status

AC3

- As a User
- I want to set my task as done
- So my task will be marked as done

## Technical specification

```
POST /api/todos
{'task':'My new task'}

GET /api/todos
{   
    {'task':'My first task','done':false},
    {'task':'My second task','done':false},
    {'task':'My finished task','done':true},
}

PATCH /api/todos/{id}
{'done':true}
```
