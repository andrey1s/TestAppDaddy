<?php

namespace AppBundle\Service;

use AppBundle\DataProvider\DataProviderInterface;
use AppBundle\Model\CalculateInstall;
use AppBundle\Parser\ParserInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class Calculate
{
    /**
     * @var ParserInterface
     */
    private $parser;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @var DataProviderInterface
     */
    private $dataProvider;

    /**
     * Calculate constructor.
     *
     * @param ParserInterface       $parser
     * @param ValidatorInterface    $validator
     * @param DataProviderInterface $dataProvider
     */
    public function __construct(ParserInterface $parser, ValidatorInterface $validator, DataProviderInterface $dataProvider)
    {
        $this->parser = $parser;
        $this->validator = $validator;
        $this->dataProvider = $dataProvider;
    }

    /**
     * @param $data
     *
     * @return CalculateInstall[]|\Iterator
     */
    public function calculate($data)
    {
        if ($this->parser->support($data)) {
            $installList = $this->parser->parse($data);
            foreach ($installList as $install) {
                $error = $this->validator->validate($install);
                if (!count($error)) {
                    $time = $install->getInstallTime()->getTimestamp();
                    $this->dataProvider->inc($install->getAppId(), $install->getCountry(), $time - ($time % 300));
                }
            }
        }

        return $this->dataProvider->getResult();
    }
}
