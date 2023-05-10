<?php

declare(strict_types=1);

namespace Utils\Rector\Rector;

use PhpParser\Node;
use PhpParser\Node\Identifier;
use PhpParser\Node\Stmt\ClassMethod;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

final class MyFirstRector extends AbstractRector
{
    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Change part of method name from Emerald to Green.', [
                new CodeSample(
                    // code before
                    'public function hierophantEmerald(): void {}',
                    // code after
                    'public function hierophantGreen(): void {}'
                ),
            ]
        );
    }

    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes(): array
    {
        return [ClassMethod::class];
    }

    /**
     * @param ClassMethod $node
     */
    public function refactor(Node $node): ?Node
    {
        $methodName = $this->getName($node->name);
        if ($methodName === null) {
            return null;
        }

        $refactoredMethodName = str_replace('Emerald', 'Green', $methodName);
        $node->name = new Identifier($refactoredMethodName);

        return $node;
    }
}