<?php

declare(strict_types=1);

namespace Rector\NodeTypeResolver;

use PhpParser\Node\Stmt;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor\CloningVisitor;
use PhpParser\NodeVisitor\NodeConnectingVisitor;
use Rector\Core\ValueObject\Application\File;
use Rector\NodeTypeResolver\NodeVisitor\FunctionLikeParamArgPositionNodeVisitor;
use Rector\NodeTypeResolver\NodeVisitor\NamespaceNodeVisitor;
use Rector\NodeTypeResolver\NodeVisitor\StatementNodeVisitor;
use Rector\NodeTypeResolver\PHPStan\Scope\PHPStanNodeScopeResolver;

final class NodeScopeRetraverser
{
    public function __construct(
        private PHPStanNodeScopeResolver $phpStanNodeScopeResolver,
    ) {
    }

}
