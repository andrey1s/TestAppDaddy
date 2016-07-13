<?php

namespace AppBundle\Parser;

use AppBundle\Model\Install;

interface ParserInterface
{
    /**
     * @param mixed $data
     *
     * @return \Iterator|Install[]
     */
    public function parse($data);

    /**
     * @param mixed $data
     *
     * @return bool
     */
    public function support($data);
}
