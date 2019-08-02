<?php

namespace Reformagkh\Grabber\RequestCreator;

use Reformagkh\Grabber\Message\InvalidArgumentException;
use Reformagkh\Grabber\Params\RequestCreatorParams;
use Reformagkh\Grabber\RequestCreator\Converter\ConvertInterface;
use Reformagkh\Grabber\RequestOptions\RequestOptionsInterface;

class AbstractRequestCreator implements RequestCreatorInterface {

    /**
     * Parameters
     *
     * @var RequestCreatorParams
     */
    protected $params;
    /**
     * Associative array of messages (as keys) and versions (as values) that are present in the WSDL.
     *
     * @var array
     */
    protected $messagesAndVersions = [];
    /**
     * All message builders already instantiated
     *
     * @var array
     */
    protected $messageBuilders = [];
    /**
     * Base Request Creator constructor.
     *
     * @param RequestCreatorParams $params
     */
    public function __construct(RequestCreatorParams $params)
    {
        $this->params = $params;
        $this->messagesAndVersions = $params->messagesAndVersions;
    }

    /**
     * Create a request message for a given message with a set of options.
     *
     * @param string $messageName the message name as named in the WSDL
     * @param RequestOptionsInterface $params
     * @throws InvalidArgumentException When invalid input is detected during message creation.
     * @return mixed the created request
     */
    public function createRequest(string $messageName, RequestOptionsInterface $params)
    {
        $builder = $this->findBuilderForMessage($messageName);
        if ($builder instanceof ConvertInterface) {
            return $builder->convert($params);
        } else {
            throw new \RuntimeException('No builder found for message '.$messageName);
        }
    }

    /**
     * Find the correct builder for a given message
     *
     * Builder classes implement the ConvertInterface and are used to build only one kind of message.
     *
     * The standard converter class is
     * __NAMESPACE__ \ Converter \ Sectionname \ Messagename + "Conv"
     *
     * @param string $messageName
     * @return ConvertInterface|null
     */
    protected function findBuilderForMessage($messageName)
    {
        $builder = null;
        if (array_key_exists($messageName, $this->messageBuilders) &&
            $this->messageBuilders[$messageName] instanceof ConvertInterface
        ) {
            $builder = $this->messageBuilders[$messageName];
        } else {
            $messageName = ucfirst($messageName);
            $builderClass = __NAMESPACE__.'\\Converter\\'.$messageName."Conv";
            if (class_exists($builderClass)) {
                /** @var ConvertInterface $builder */
                $builder = new $builderClass();
                $builder->setParams($this->params);
                $this->messageBuilders[$messageName] = $builder;
            }
        }
        return $builder;
    }


}
