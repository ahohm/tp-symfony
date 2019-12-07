<?php
namespace ParcBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */

class Model
{

        /**
        * @ORM\GeneratedValue
        * @ORM\Id
        * @ORM\Column(type="integer")
        */
private $id;

/**
 * @ORM\Column(type="string", length=255)
 */
private $libelle;

/**
 * @ORM\Column(type="string", length=255)
 */
private $pays;

    /**
     * Model constructor.
     * @param $id
     * @param $libelle
     * @param $pays
     */


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param mixed $pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    }


}