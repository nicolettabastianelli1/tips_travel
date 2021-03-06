<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Luogo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Luogo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="longitudine", type="decimal")
     */
    private $longitudine;

    /**
     * @var string
     *
     * @ORM\Column(name="latitudine", type="decimal")
     */
    private $latitudine;



    /**
    *
    * @ORM\OneToMany(targetEntity="Viaggio", mappedBy="luogo")
    */
    protected $luogo_info;

    public function __construct()
    {
      $this->luogo_info = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Luogo
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set longitudine
     *
     * @param string $longitudine
     *
     * @return Luogo
     */
    public function setLongitudine($longitudine)
    {
        $this->longitudine = $longitudine;

        return $this;
    }

    /**
     * Get longitudine
     *
     * @return string
     */
    public function getLongitudine()
    {
        return $this->longitudine;
    }

    /**
     * Set latitudine
     *
     * @param string $latitudine
     *
     * @return Luogo
     */
    public function setLatitudine($latitudine)
    {
        $this->latitudine = $latitudine;

        return $this;
    }

    /**
     * Get latitudine
     *
     * @return string
     */
    public function getLatitudine()
    {
        return $this->latitudine;
    }

    /**
     * Add luogoInfo
     *
     * @param \AppBundle\Entity\Viaggio $luogoInfo
     *
     * @return Luogo
     */
    public function addLuogoInfo(\AppBundle\Entity\Viaggio $luogoInfo)
    {
        $this->luogo_info[] = $luogoInfo;

        return $this;
    }

    /**
     * Remove luogoInfo
     *
     * @param \AppBundle\Entity\Viaggio $luogoInfo
     */
    public function removeLuogoInfo(\AppBundle\Entity\Viaggio $luogoInfo)
    {
        $this->luogo_info->removeElement($luogoInfo);
    }

    /**
     * Get luogoInfo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLuogoInfo()
    {
        return $this->luogo_info;
    }
}
