<?php 
namespace Web\Frontcontroller\Models;
//entity сущность
class Picture
{

	private $id;
	private $title;
	private $description;
	private $paths = [];

	public function __construct($id, $title, $description, $paths)
	{
		$this->id = $id;
		$this->title = $title;
		$this->description = $description;
		$this->paths = $paths;
	}

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
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
    public function getPath()
    {
        return $this->paths;
    }
}



 ?>