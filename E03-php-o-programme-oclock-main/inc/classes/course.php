<?php

class Course extends CoreModel
{
    private $title;
    private $image;
    private $shortDescription;
    private $description;
    private $programContent;
    private $numberOfHours;
    private $price;
    private $classDate;
    private $professor;
    private $modality;
    private $requiredLevel;

    public function __construct(
        $id,
        $title = '',
        $image = '',
        $shortDescription = '',
        $description = '',
        $programContent = [],
        $numberOfHours = 0,
        $price = 0,
        $classDate = '',
        $professor = '',
        $modality = '',
        $requiredLevel = ''
    ) {
        $this->id = $id;
        $this->setTitle($title);
        $this->setImage($image);
        $this->setShortDescription($shortDescription);
        $this->setDescription($description);
        $this->setProgramContent($programContent);
        $this->setNumberOfHours($numberOfHours);
        $this->setPrice($price);
        $this->setClassDate($classDate);
        $this->setProfessor($professor);
        $this->setModality($modality);
        $this->setRequiredLevel($requiredLevel);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Course
    {
        $this->title = $title;

        return $this;
    }

    public function getImage(): string
    {
        return "images/{$this->image}";
    }

    public function setImage(string $image): Course
    {
        $this->image = $image;

        return $this;
    }

    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(string $shortDescription): Course
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Course
    {
        $this->description = $description;

        return $this;
    }

    public function getProgramContent(): array
    {
        return $this->programContent;
    }

    public function setProgramContent(array $programContent): Course
    {
        $this->programContent = $programContent;

        return $this;
    }

    public function addToProgramContent(string $programContentElement): Course
    {
        $this->programContent[] = $programContentElement;

        return $this;
    }

    public function getNumberOfHours(): int
    {
        return $this->numberOfHours;
    }

    public function setNumberOfHours(?int $numberOfHours): Course
    {
        if ($numberOfHours > 0) {
            $this->numberOfHours = $numberOfHours;
        }

        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(?float $price): Course
    {
        if ($price > 0) {
            $this->price = $price;
        }

        return $this;
    }

    public function getClassDate(): string
    {
        return $this->classDate;
    }

    public function setClassDate(string $classDate): Course
    {
        $this->classDate = $classDate;

        return $this;
    }

    public function getProfessor(): string
    {
        return $this->professor;
    }

    public function setProfessor(string $professor): Course
    {
        $this->professor = $professor;

        return $this;
    }

    public function getModality(): string
    {
        return $this->modality;
    }

    public function setModality(string $modality): Course
    {
        $this->modality = $modality;

        return $this;
    }

    public function getRequiredLevel(): string
    {
        return $this->requiredLevel;
    }

    public function setRequiredLevel(string $requiredLevel): Course
    {
        $this->requiredLevel = $requiredLevel;

        return $this;
    }

    public function save()
    {
        //Ici, on sauvegardera les modifications en BDD
    }

    public static function findAll()
    {
        $dbConnection = DB::getPdo();

        $courses = [];

        $sql = "SELECT * FROM courses";
        $results = $dbConnection->query($sql)
            ->fetchAll(PDO::FETCH_OBJ);


        //On récupère les résultats
        //Et on crée un tableau d'instances de Course
        //que l'on renvoie
        foreach ($results as $result) {
            $course = new Course($result->id);
            $course->setTitle($result->title);
            $course->setImage($result->image);
            $course->setShortDescription($result->shortDescription);
            $course->setDescription($result->description);
            //Stockage d'un tableau de valeur en mysql
            //Pour faire ça proprement, il faudra voir la notion de JOIN !
            $course->setProgramContent(json_decode($result->programContent));
            $course->setNumberOfHours($result->numberOfHours);
            $course->setPrice($result->price);
            $course->setClassDate($result->classDate);
            $course->setProfessor($result->professor);
            $course->setModality($result->modality);
            $course->setRequiredLevel($result->requiredLevel);

            $courses[] = $course;
        }

        return $courses;
    }

    static public function findById($id)
    {
        $pdoDBConnexion = DB::getPDO();

        $sql = "SELECT * FROM courses WHERE id = $id";
        $pdoStatement = $pdoDBConnexion->query($sql);

        $result = $pdoStatement->fetch(PDO::FETCH_OBJ);

        $course = new Course($result->id);
        $course->setTitle($result->title);
        $course->setImage($result->image);
        $course->setShortDescription($result->shortDescription);
        $course->setDescription($result->description);
        $course->setProgramContent(json_decode($result->programContent));
        $course->setNumberOfHours($result->numberOfHours);
        $course->setPrice($result->price);
        $course->setClassDate($result->classDate);
        $course->setProfessor($result->professor);
        $course->setModality($result->modality);
        $course->setRequiredLevel($result->requiredLevel);

        return $course;
    }
}
