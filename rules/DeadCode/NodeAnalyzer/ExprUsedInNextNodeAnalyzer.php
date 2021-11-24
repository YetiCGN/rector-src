<?php

declare(strict_types=1);

namespace Rector\DeadCode\NodeAnalyzer;

use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Stmt\If_;
use Rector\Core\PhpParser\Node\BetterNodeFinder;
use Rector\EarlyReturn\Rector\If_\RemoveAlwaysElseRector;
use Rector\NodeTypeResolver\Node\AttributeKey;

final class ExprUsedInNextNodeAnalyzer
{
    public function __construct(
        private BetterNodeFinder $betterNodeFinder,
        private ExprUsedInNodeAnalyzer $exprUsedInNodeAnalyzer
    ) {
    }

    public function isUsed(Expr $expr): bool
    {
        return (bool) $this->betterNodeFinder->findFirstNext(
            $expr,
            function (Node $node) use ($expr): bool {
                if (! $node instanceof If_) {
                    return $this->exprUsedInNodeAnalyzer->isUsed($node, $expr);
                }

                /**
                 * handle when used along with RemoveAlwaysElseRector
                 */
                if (! $this->hasIfChangedByRemoveAlwaysElseRector($node)) {
                    return $this->exprUsedInNodeAnalyzer->isUsed($node, $expr);
                }

                return true;
            }
        );
    }

    private function hasIfChangedByRemoveAlwaysElseRector(If_ $if): bool
    {
        $createdByRule = $if->getAttribute(AttributeKey::CREATED_BY_RULE);
        return $createdByRule === RemoveAlwaysElseRector::class;
    }
}
