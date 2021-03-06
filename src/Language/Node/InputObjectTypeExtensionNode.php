<?php

namespace Digia\GraphQL\Language\Node;

use Digia\GraphQL\Language\Location;

class InputObjectTypeExtensionNode extends AbstractNode implements
    TypeSystemExtensionNodeInterface,
    NameAwareInterface,
    DirectivesAwareInterface
{
    use NameTrait;
    use DirectivesTrait;
    use InputFieldsTrait;

    /**
     * InputObjectTypeExtensionNode constructor.
     *
     * @param NameNode                   $name
     * @param DirectiveNode[]            $directives
     * @param InputValueDefinitionNode[] $fields
     * @param Location|null              $location
     */
    public function __construct(
        NameNode $name,
        array $directives,
        array $fields,
        ?Location $location
    ) {
        parent::__construct(NodeKindEnum::INPUT_OBJECT_TYPE_EXTENSION, $location);

        $this->name        = $name;
        $this->directives  = $directives;
        $this->fields      = $fields;
    }

    /**
     * @inheritdoc
     */
    public function toAST(): array
    {
        return [
            'kind'       => $this->kind,
            'name'       => $this->getNameAST(),
            'directives' => $this->getDirectivesAST(),
            'fields'     => $this->getFieldsAST(),
            'loc'        => $this->getLocationAST(),
        ];
    }
}
