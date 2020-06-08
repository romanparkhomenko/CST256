<?php

namespace App\Models;


class AffinityGroupModel {
    private $id;
    private $groupname;
    private $city;
    private $description;
    private $skills;
    private $education;

    public function __construct($groupname, $description) {
        $this->groupname = $groupname;
        $this->description = $description;
    }

    /// GETTERS AND SETTERS

    /**
     * @return mixed
     */
    public function getGroupname()
    {
        return $this->groupname;
    }

    /**
     * @param mixed $groupname
     */
    public function setGroupname($groupname): void
    {
        $this->groupname = $groupname;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }


    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * @return mixed
     */
    public function getEducation()
    {
        return $this->education;
    }

    /**
     * @param mixed $skills
     */
    public function setSkills($skills): void
    {
        $this->skills = $skills;
    }

    /**
     * @param mixed $education
     */
    public function setEducation($education): void
    {
        $this->education = $education;
    }

}
