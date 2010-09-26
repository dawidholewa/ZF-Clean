<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    
    /**
     * Inicjalizacja Doctrine ORM.
     *
     * @return Doctrine_Manager
     */
    protected function _initDoctrine() {
        $this->getApplication()->getAutoloader()->pushAutoloader(array('Doctrine', 'autoload'));
        spl_autoload_register(array('Doctrine', 'modelsAutoload'));

        $manager = Doctrine_Manager::getInstance();
        $manager->setAttribute(Doctrine::ATTR_AUTO_ACCESSOR_OVERRIDE, true);
        $manager->setAttribute(
                Doctrine::ATTR_MODEL_LOADING,
                Doctrine::MODEL_LOADING_AGGRESSIVE
        );
        $manager->setAttribute(Doctrine::ATTR_AUTOLOAD_TABLE_CLASSES, true);

        // Tutaj ustawiamy ewentualny prefix dla tabel.
        $manager->setAttribute(Doctrine_Core::ATTR_TBLNAME_FORMAT, '%s');

        $doctrineConfig = $this->getOption('doctrine');

        $connection = Doctrine_Manager::connection($doctrineConfig['dsn'], 'doctrine');
        $connection->setAttribute(Doctrine::ATTR_USE_NATIVE_ENUM, TRUE);

        return $connection;
    }
}

