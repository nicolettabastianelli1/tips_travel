<?php
namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="Utente")
 */
class Utente extends BaseUser
{
  /**
  * @ORM\Id
  * @var integer $id
  * @ORM\Column(type="integer")
  * @ORM\GeneratedValue(strategy="AUTO")
  */
  protected $id;

  /**
  * @var string
  * @ORM\Column(type="string", length=255, nullable=false )
  */
  protected $firstname;

  /**
  * @var string
  * @ORM\Column(type="string", length=255, nullable=false )
  */
  protected $lastname;

  /**
  *
  * @ORM\OneToMany(targetEntity="Viaggio", mappedBy="utente")
  */
  protected $viaggi;

  public function __construct()
  {
    $this->viaggi = new ArrayCollection();
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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Utente
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Utente
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Utente
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Add viaggi
     *
     * @param \AppBundle\Entity\Viaggio $viaggi
     *
     * @return Utente
     */
    public function addViaggi(\AppBundle\Entity\Viaggio $viaggi)
    {
        $this->viaggi[] = $viaggi;

        return $this;
    }

    /**
     * Remove viaggi
     *
     * @param \AppBundle\Entity\Viaggio $viaggi
     */
    public function removeViaggi(\AppBundle\Entity\Viaggio $viaggi)
    {
        $this->viaggi->removeElement($viaggi);
    }

    /**
     * Get viaggi
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getViaggi()
    {
        return $this->viaggi;
    }
}
