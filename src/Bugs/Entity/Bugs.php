<?php
// src/Bugs/Entity/Bugs.php
namespace Bugs\Entity;

/**
 * @Entity
 */
class Bugs {

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
    private $id;

    /** @Column(type="text") */
    private $content;
}