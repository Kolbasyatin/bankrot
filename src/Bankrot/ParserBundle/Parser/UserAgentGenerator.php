<?php

namespace Bankrot\ParserBundle\Parser;

class UserAgentGenerator
{
    static public function get()
    {
        $filename = __DIR__.'/../Resources/data/user-agents.txt';

        return trim(
            shell_exec(
                sprintf(
                    'awk NR==$((${RANDOM} %% `wc -l < %s` + 1)) %s', 
                    $filename,
                    $filename
                )
            )
        );
    }
}
