<?php

namespace Rector\Tests\Php74\Rector\Property\TypedPropertyRector\FixtureClassLikeTypeOnly;

use Doctrine\ORM\Mapping as ORM;

class Loc
{

    /**
     * @ORM\OneToMany(targetEntity=Loc::class, mappedBy="parent", cascade={"persist", "remove"}, fetch="LAZY")
     */
    private $children;

    public function setChildren($children)
    {
        $this->children = $children;
        return $this;
    }

    public function addChild(Loc $child)
    {
        $this->children[] = $child;

        return $this;
    }

    public function removeChild(Loc $child)
    {
        $this->children->removeElement($child);
    }
}

?>
    -----
<?php

namespace Rector\Tests\Php74\Rector\Property\TypedPropertyRector\FixtureClassLikeTypeOnly;

use Doctrine\ORM\Mapping as ORM;

class Loc
{

    /**
     * @ORM\OneToMany(targetEntity=Loc::class, mappedBy="parent", cascade={"persist", "remove"}, fetch="LAZY")
     */
    private ?\Doctrine\Common\Collections\Collection $children = null;

    public function setChildren($children)
    {
        $this->children = $children;
        return $this;
    }

    public function addChild(Loc $child)
    {
        $this->children[] = $child;

        return $this;
    }

    public function removeChild(Loc $child)
    {
        $this->children->removeElement($child);
    }
}

?>
