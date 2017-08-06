<?php declare(strict_types=1);

namespace Rector\Tests\NodeVisitor\UpgradeDeprecation\DeprecatedParentClassToTraitNodeVisitor;

use Rector\Testing\PHPUnit\AbstractReconstructorTestCase;

final class Test extends AbstractReconstructorTestCase
{
    public function test(): void
    {
        //        $this->doTestFileMatchesExpectedContent(
        //            __DIR__ . '/wrong/wrong.php.inc',
        //            __DIR__ . '/correct/correct.php.inc'
        //        );
        $this->doTestFileMatchesExpectedContent(
            __DIR__ . '/wrong/wrong2.php.inc',
            __DIR__ . '/correct/correct2.php.inc'
        );
    }
}
