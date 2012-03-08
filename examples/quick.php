<?
require_once( "sparqllib.php" );

$data = sparql_get( 
	"http://rdf.ecs.soton.ac.uk/sparql/",
	"
@PREFIX foaf: <http://xmlns.com/foaf/0.1/>
SELECT * WHERE { ?person a foaf:Person . ?person foaf:name ?name } LIMIT 5
" );

print "<table border='1'>";
print "<tr>";
foreach( $data->fields() as $field )
{
	print "<th>$field</th>";
}
print "</tr>";
foreach( $data as $row )
{
	print "<tr>";
	foreach( $data->fields() as $field )
	{
		print "<td>$row[$field]</td>";
	}
	print "</tr>";
}
print "</table>";

