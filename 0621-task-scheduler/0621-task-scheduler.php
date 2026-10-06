class Solution {

    /**
     * @param String[] $tasks
     * @param Integer $n
     * @return Integer
     */
    function leastInterval($tasks, $n) {
        
        /*
        |--------------------------------------------------------------------------
        | STEP 1: COUNT HOW MANY TIMES EACH TASK EXISTS
        |--------------------------------------------------------------------------
        |
        | Example:
        |
        | tasks = [A, A, A, B, B, B]
        |
        | We want:
        |
        | A -> 3
        | B -> 3
        |
        | We use an array of size 26 because tasks are A-Z.
        |
        | Index 0 = A
        | Index 1 = B
        | Index 2 = C
        | ...
        | Index 25 = Z
        |
        */

        $freq = array_fill(0, 26, 0);


        /*
        | Go through every task and increase its frequency.
        |
        | ord('A') = 65
        | ord('B') = 66
        |
        | So:
        |
        | ord('A') - ord('A') = 0
        | ord('B') - ord('A') = 1
        |
        */

        foreach ($tasks as $task) {

            // Convert A-Z into index 0-25
            $index = ord($task) - ord('A');

            // Increase frequency of this task
            $freq[$index]++;
        }


        /*
        |--------------------------------------------------------------------------
        | STEP 2: KEEP ONLY TASKS THAT ACTUALLY EXIST
        |--------------------------------------------------------------------------
        |
        | Initially $freq has 26 values:
        |
        | [3, 3, 0, 0, 0, 0, ...]
        |
        | We don't need all the zeros.
        |
        | So:
        |
        | [3, 3, 0, 0, 0]
        |
        | becomes:
        |
        | [3, 3]
        |
        | IMPORTANT:
        |
        | We are storing only the NUMBER OF REMAINING TASKS.
        |
        | We are NOT storing A/B here.
        |
        */

        $heap = array_values(
            array_filter(
                $freq,
                fn($f) => $f > 0
            )
        );


        /*
        |--------------------------------------------------------------------------
        | STEP 3: SORT FROM HIGHEST FREQUENCY TO LOWEST
        |--------------------------------------------------------------------------
        |
        | Example:
        |
        | Before sorting:
        |
        | [2, 5, 3]
        |
        | After sorting:
        |
        | [5, 3, 2]
        |
        | The first element is always the task with the
        | highest number of remaining copies.
        |
        | We want to execute the task with the highest
        | remaining frequency first.
        |
        | NOTE:
        | This is acting like a simple MAX HEAP.
        | It is not a real PHP Heap; we are simulating one
        | using an array + sorting.
        |
        */

        rsort($heap);


        /*
        |--------------------------------------------------------------------------
        | STEP 4: CREATE COOLDOWN LIST
        |--------------------------------------------------------------------------
        |
        | After we execute a task, we cannot immediately
        | execute the same task again.
        |
        | Example:
        |
        | n = 2
        |
        | We execute A at time 1.
        |
        | A must wait before it can be executed again.
        |
        | So we store:
        |
        | [
        |     remaining_count,
        |     available_time
        | ]
        |
        | Example:
        |
        | [2, 4]
        |
        | means:
        |
        | "This task has 2 copies remaining,
        |  and it can be used again at time 4."
        |
        */

        $cooldown = [];


        /*
        |--------------------------------------------------------------------------
        | STEP 5: CURRENT CPU TIME
        |--------------------------------------------------------------------------
        |
        | Every CPU interval increases time by 1.
        |
        | time = 1
        | time = 2
        | time = 3
        | ...
        |
        */

        $time = 0;


        /*
        |--------------------------------------------------------------------------
        | STEP 6: KEEP RUNNING UNTIL ALL TASKS ARE FINISHED
        |--------------------------------------------------------------------------
        |
        | We need to continue if:
        |
        | 1. There are tasks available in $heap
        |
        | OR
        |
        | 2. There are tasks waiting in $cooldown
        |
        | When BOTH are empty, all tasks are finished.
        |
        */

        while (!empty($heap) || !empty($cooldown)) {


            /*
            |--------------------------------------------------------------------------
            | ONE CPU INTERVAL HAS PASSED
            |--------------------------------------------------------------------------
            |
            | Every time this loop runs, we process exactly
            | ONE CPU interval.
            |
            */

            $time++;


            /*
            |--------------------------------------------------------------------------
            | STEP 7: CHECK COOLDOWN
            |--------------------------------------------------------------------------
            |
            | Some task may have finished its waiting period.
            |
            | Example:
            |
            | Current time = 4
            |
            | cooldown:
            |
            | [2, 4]
            |
            | This means the task is available at time 4.
            |
            | So:
            |
            | available_time <= current_time
            |
            | 4 <= 4
            |
            | TRUE
            |
            | Therefore, move the task from COOLDOWN
            | back to AVAILABLE ($heap).
            |
            */

            if (!empty($cooldown) && $cooldown[0][1] <= $time
            ) {

                /*
                | Remove the first task from cooldown.
                |
                | Example:
                |
                | [2, 4]
                |
                | becomes:
                |
                | $count = 2
                | $availableTime = 4
                |
                */

                [$count, $availableTime] = array_shift($cooldown);


                /*
                | The task has finished waiting.
                |
                | So put it back into the list of tasks
                | that can currently be executed.
                */

                $heap[] = $count;


                /*
                | Again sort highest frequency first.
                |
                | Example:
                |
                | heap before:
                | [1, 2]
                |
                | after:
                | [2, 1]
                |
                */

                rsort($heap);
            }


            /*
            |--------------------------------------------------------------------------
            | STEP 8: EXECUTE AN AVAILABLE TASK
            |--------------------------------------------------------------------------
            |
            | If $heap is NOT empty:
            |
            | There is at least one task that can be executed
            | at this moment.
            |
            */

            if (!empty($heap)) {


                /*
                | Take the task with the highest remaining frequency.
                |
                | Example:
                |
                | heap = [3, 2, 1]
                |
                | Take:
                |
                | 3
                |
                | After removing:
                |
                | heap = [2, 1]
                |
                */

                $count = array_shift($heap);


                /*
                |--------------------------------------------------------------------------
                | EXECUTE ONE COPY OF THE TASK
                |--------------------------------------------------------------------------
                |
                | Suppose:
                |
                | count = 3
                |
                | We execute ONE task.
                |
                | Remaining:
                |
                | 3 -> 2
                |
                */

                $count--;


                /*
                |--------------------------------------------------------------------------
                | STEP 9: DOES THIS TASK HAVE MORE COPIES?
                |--------------------------------------------------------------------------
                |
                | If count > 0:
                |
                | There are still more copies of this task.
                |
                | BUT we cannot execute it immediately again.
                |
                | Therefore, put it into COOLDOWN.
                |
                */

                if ($count > 0) {


                    /*
                    | Calculate when this task becomes available again.
                    |
                    | Current time = 1
                    | n = 2
                    |
                    | We use:
                    |
                    | time + n + 1
                    |
                    | 1 + 2 + 1 = 4
                    |
                    | So this task can be used again at time 4.
                    |
                    */

                    $cooldown[] = [
                        $count,
                        $time + $n + 1
                    ];
                }


            } else {


                /*
                |--------------------------------------------------------------------------
                | STEP 10: NO TASK IS AVAILABLE → CPU IS IDLE
                |--------------------------------------------------------------------------
                |
                | If $heap is empty, it means:
                |
                | - There are still tasks remaining
                | - BUT all of them are currently in cooldown
                |
                | So the CPU cannot execute anything.
                |
                | We simply do NOTHING.
                |
                | BUT remember:
                |
                | $time++ already happened.
                |
                | Therefore this idle period still counts
                | as one CPU interval.
                |
                */
            }
        }


        /*
        |--------------------------------------------------------------------------
        | STEP 11: RETURN TOTAL CPU INTERVALS
        |--------------------------------------------------------------------------
        |
        | When we reach here:
        |
        | $heap = []
        | $cooldown = []
        |
        | That means all tasks are completed.
        |
        | $time contains the total number of CPU intervals,
        | including IDLE intervals.
        |
        */

        return $time;
    }

}