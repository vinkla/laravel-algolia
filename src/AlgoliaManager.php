<?php

namespace Vinkla\Algolia;

use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;
use Vinkla\Algolia\Factories\AlgoliaFactory;

class AlgoliaManager extends AbstractManager
{
    /**
     * The Algolia factory.
     *
     * @var \Vinkla\Algolia\Factories\AlgoliaFactory
     */
    private $factory;

    /**
     * Setup the Algolia factory.
     *
     * @param \Illuminate\Contracts\Config\Repository $config
     * @param \Vinkla\Algolia\Factories\AlgoliaFactory $factory
     */
    public function __construct(Repository $config, AlgoliaFactory $factory)
    {
        parent::__construct($config);

        $this->factory = $factory;
    }

    /**
     * Create the connection instance.
     *
     * @param array $config
     *
     * @return mixed
     */
    protected function createConnection(array $config)
    {
        return $this->factory->make($config);
    }

    /**
     * Get the configuration name.
     *
     * @return string
     */
    protected function getConfigName()
    {
        return 'algolia';
    }

    /**
     * Get the factory instance.
     */
    public function getFactory()
    {
        return $this->factory;
    }
}
