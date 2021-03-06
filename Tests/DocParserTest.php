<?php
/**
 * @copyright 2014 Integ S.A.
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 * @author Javier Lorenzana <javier.lorenzana@gointegro.com>
 */

namespace GoIntegro\Raml;

// Mocks.
use Codeception\Util\Stub;

class DocParserTest extends \PHPUnit_Framework_TestCase
{
    const RAML_PATH = '/Resources/raml/some-resources.raml';

    public function testParsingRamlDoc()
    {
        /* Given... (Fixture) */
        $mapCollectionParser = Stub::makeEmpty(
            'GoIntegro\\Raml\\MapCollectionParser'
        );
        $docExpander = Stub::makeEmpty(
            'GoIntegro\\Raml\\DocExpander'
        );
        $parser = new DocParser($mapCollectionParser, $docExpander);
        /* When... (Action) */
        $ramlDoc = $parser->parse(__DIR__ . self::RAML_PATH);
        /* Then... (Assertions) */
        $this->assertInstanceOf(
            'GoIntegro\\Raml\\RamlDoc', $ramlDoc
        );
    }
}
