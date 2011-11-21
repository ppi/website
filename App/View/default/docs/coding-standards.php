

<div class="content-box">
	<h1>Coding Standards</h1>
	<p>If you are interested in contributing to the PPI project the following documentation will help you get to grips with the style of coding we have. It is mostly common sense and readability guidelines. Most of our guidelines can be matches back to the PEAR standards.</p>
</div>

<div class="content-box">

<h2>PHP Code Tags</h2>
<p>All framework files that consist of PHP only (no html..etc) should start with &lt;?php and have no ending ?>.</p>

<pre><code class="php">
&lt;?php
// Some code here
</code></pre>
</div>

<div class="content-box">
<h2>Indentation</h2>
<p>We use tabs for indenting code blocks.</p>

<pre><code class="php">
// Level 1
    // Level 2
        // Level 3
    // Level 2
// Level 1
</code></pre>

<p>For Lining up operators for readability, we use spaces as we're not indenting but merely lining things up.</p>

<pre><code class="php">
&lt;?php
$str  = 'foo';
$num  = 'bar';
$buzz = 'boom';
</code></pre>

</div>

<div class="content-box">
<h2>Variables</h2>
<p>Assignment of variables with the = operator must have a space before and after the operator. Variable names must be camelCase starting with a lowercase character</p>

<pre><code class="php">
&lt;?php
// Bad
$first_name = "foo";
$firstname = "foo";
$firstName="foo";

// Good
$firstName = "foo";
</code></pre>

</div>


<div class="content-box">

<h2>Constants</h2>
<p>Constants should contain captial letters. If new words are required then the underscore "_" character should be used</p>

<pre><code class="php">
&lt;?php
// Bad
define('firstname', 'foo');
define('FirstName', 'foo');
define('Firstname', 'foo');

// Good
define('FIRSTNAME', 'foo');
define('FIRST_NAME', 'foo');
</code></pre>

</div>

<div class="content-box">

<h2>Casting</h2>
<p>When casting there must be no spaces between the parenthesis and the cast keyword. Spaces must occur before and after the cast section for improved readability.</p>

<pre><code class="php">
&lt;?php
$int = (int) $str;
$str = (string) $int;

if( (int) $str === 1)
someFunc( (int) $number);
</div>

<div class="content-box">

<h2>Strings</h2>
<p>When string literals are used and no variable substitution is required, the string must be enclosed with single quotes.</p>

<pre><code class="php">
&lt;?php
$str = 'single quotes';
</code></pre>

<p>When strings contain interpolation (variable substitution) double quotes should be used.</p>

<pre><code class="php">
&lt;?php
$str = 'Hello World';
$str2 = "My String Is: $str";
</code></pre>

<h3>Multiple quote types within strings</h3>

<p>When you have to use an apostrophe then double quotes are welcome. When you have to use double quotes for something like HTML attributes, then single quotes are used.</p>

<pre><code class="php">
&lt;?php
$input = '&lt;input type="text" name="age"&gt;';
$message = "This contains apostrophe, doesn't it?";
</code></pre>

<h3>Variable Substitution</h3>
<p>When you are using double quotes to interpolate strings, both of the below are acceptable forms of interpolation.</p>

<pre><code class="php">
&lt;?php
$str = "My username is $username";
$str2 = "My username is {$username}";
</code></pre>

<p>The following is not permitted.</p>

<pre><code class="php">
&lt;?php
$str = "My username is ${username}";
</code></pre>

<h3>String Concatenation</h3>
<p>When concatenating strings the "." character should always be used and a space before and after the operator should occur</p>

<pre><code class="php">
&lt;?php
$str = 'String One' . 'String Two';
</code></pre>

<h3>Multi-Line Concatenation</h3>
<p>When forming large strings via multiple concats, it's preferred to make this happen on multiple lines. You can either have your "." operator at the start of the new line or at the end of the former line. As long as it's consistent and easy to read.</p>

<pre><code class="php">
&lt;?php
$str = 'This is string one' .
       'This is string two' .
       'Another String';

$str = 'This is string one'
     . 'This is string two'
     . 'Another string';
</code></pre>

</div>


<div class="content-box">

<h2>Arrays</h2>

<p>After every comma there must be a space.</p>

<h3>Numerical Keys</h3>

<pre><code class="php">
&lt;?php
$foo = array(1, 54, 67, 'foo', 'bar', 'baz', 887);
$foo = array(
    1, 54, 67, 'foo', 'bar', 'baz', 887, 5426675,
    "foobar", "buzz", 44524, 928744, "foobuzz"
);
</code></pre>

<h3>Associative Keys</h3>

<pre><code class="php">
&lt;?php
$foo = array('controller' => 'user', 'method' => 'create');
$foo = array(
    'controller' => 'user',
    'method'     => 'create'
);
</code></pre>

</div>

<div class="content-box">

<h2>Control Structures</h2>

<h3>if / elseif / else constructs</h3>
<p>There must be no spaces between the construct and the first parenthesis. There must be a space between the ending parenthesis and the opening brace. The brace must be on the same line as the if/elseif/else keyword
Every control structure must use braces. elseif is used rather than else if. if and endif are not used, braces are always used.</p>

<pre><code class="php">
&lt;?php

// Bad
if($status==2)
if($status == 2) echo "it is two";
if($status == 2):
    echo "it is two";
endif;

// Good
if($status == 2) { .. }
if($status == 2) { echo "it is two"; }
if($status == 2) {
    echo "it is two";
}


// Bad
if($a == $b && $c || $b == $a)

// Good
if($a == $b && $c || ($b == $a)) { .. }
if(($a == $b && $c) || ($b == $a)) { .. }


// Example
if($a && !$b && $c > 50) {
    // ...
} elseif($d || $e <= 50) {
    // ...
} else {
    // ...
}
</code></pre>

<h3>Switch</h3>
<p>The break keyword must be indented from the case keyword. If you return from your case then there is no need for the break keyword. The default keyword must never be omitted from the switch statement.</p>

<pre><code class="php">
&lt;?php
switch($var) {

    case 'a':
        echo 'it is a';
        break;

    case 'b':
        echo 'it is b';
        break;

    case 'c':
        return 'it is c';

    default:
        return 'it is d';

}
</code></pre>


</div>






<div class="content-box">

<h1>Classes and Methods</h1>

<p>Classes use the PEAR naming convention, we use underscores as DIRECTORY_SEPARATOR replacements. Braces must be on the same line as the class name.</p>

<p>PPI_Model_User => PPI/Model/User.php</p>

<pre><code class="php">
&lt;?php
class PPI_Model_User {
    // ...
}
</code></pre>

<h3>Extending classes and Implementing Interfaces</h3>
<p>The keywords extends and implements must be on the same line as the class declaration</p>

<pre><code class="php">
&lt;?php
class PPI_Model_User extends PPI_Model_Base implements PPI_Interface_User {
    // ...
}
</code></pre>

<h3>Methods</h3>
<p>Method naming conventions are the same as everything, they are camelCase. Every method must have a PHPDoc block to describe any parameters it has, and its return value.</p>

<pre><code class="php">
&lt;?php
class PPI_Foo {
    function __construct() {
         // ...
    }

    /**
     * Create a user
     *
     * @param array $data The User Data
     * @return integer The New User ID
     */
    function createUser(array $data) {
        // ...
        $userID = $this->insert($data);
        return $userID;
    }
}
</code></pre>

<h3>Class Properties</h3>
<p>Class properties follow camelCase, however if the property is protected or private then the property name is prefixed with an underscore "_".</p>

<pre><code class="php">
&lt;?php
class PPI_Foo {

    public $foo = null;
    protected $_foo = null;
    private $_foo = null;

    function __construct() {
        // ...
    }
}
</code></pre>

</div>
