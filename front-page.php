<?php
/**
 * Westridge.
 *
 * This file adds the front page template to the Westridge Theme.
 *
 * Template Name: Front Page
 *
 * @package Westridge
 * @author  Scott Loveless
 * @license GPL-2.0+
 * @link    https://scott.loveless.org/
 */

//* Force full-width-content layout setting
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

westridge_genesis_no_content();

function westridge_genesis_no_content() {
    westridge_genesis_header();
    westridge_front_page_content();
    westridge_genesis_footer();
}
//Customised Genesis Header
function westridge_genesis_header() {
    do_action( 'genesis_doctype' );
    do_action( 'genesis_title' );
    do_action( 'genesis_meta' );
    
    wp_head(); //* we need this for plugins
    ?>
    
    </head>
    <?php
    genesis_markup( array(
        'html5' => '<body %s>',
        'xhtml' => sprintf( '<body class="%s">', implode( ' ', get_body_class() ) ),
        'context' => 'body',
    ) );
    do_action( 'genesis_before' );
 
    genesis_markup( array(
        'html5' => '<div %s>',
        'xhtml' => '<div id="wrap">',
        'context' => 'site-container',
    ) );
 
    do_action( 'genesis_before_header' );
    do_action( 'genesis_header' );
    do_action( 'genesis_after_header' );
    
    // genesis_markup( array(
    // 'html5'   => '<div %s>',
    // 'xhtml'   => '<div id="inner">',
    // 'context' => 'site-inner',
    // ) );
    // genesis_structural_wrap( 'site-inner' );
    }


// Add homepage content.
function westridge_front_page_content() {
    ?>
<main>
<section class="section1">
    <div class="wrap">
        <div class="hero-bag">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/jujubes_pouch_white.png" alt="Jujubes">
        </div>
        <div class="hero-content">
            <h2><span class="hero-green">Juju... </span> <span class="hero-red">What?</span></h2>
            <p><strong>Jujube!</strong> The ancient world superfruit winning over modern taste buds. Revered for millennia for its nutraceutical powers and delicious flavor, this handy, healthy snack packs a whimsical wallop in every subtly sweet bite.</p>
            <a href="/shop/" class="button">See Products</a>
        </div>
    </div>
</section>
<section class="section2">
    <div class="wrap">
        <h2>A Nutritional Powerhouse</h2>
        <p>Jujubes are rich in Vitamins & Minerals, Antioxidants, Flavonoids, Polyphenols, and Free Amino Acids</p>
        <a href="/wellness/" class="button">Learn More</a>
    </div>
</section>
<section class="section3">
    <div class="wrap">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 574 355" class="nutrition-svg">
            <image id="3jujubes" x="105" y="20" width="373" height="314" xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/images/3jujubes.png"></image>
            <g fill="#6D9542" fill-rule="evenodd" font-size="20" font-weight="bold">
            <text transform="translate(-14 -36)">
                <tspan x="88.89" y="51">California-Grown</tspan>
                <tspan x="79.712" y="78" font-size="14" font-weight="normal">In the sunny Cuyama Valley</tspan>
            </text>
            <text transform="translate(-14 -36)">
                <tspan x="14.79" y="135">One Ingredient</tspan>
                <tspan x="17.395" y="162" font-size="14" font-weight="normal">It goes from the tree</tspan> <tspan x="46.571" y="176" font-size="14" font-weight="normal">to the bag </tspan> <tspan x="59.822" y="190" font-size="14" font-weight="normal">to you</tspan>
            </text>
            <text transform="translate(-14 -36)">
            <tspan x="59.42" y="273">Organic</tspan> <tspan x="17.604" y="300" font-size="14" font-weight="normal">No pesticides or chemicals</tspan>
            </text>
            <text transform="translate(-14 -36)">
            <tspan x="132" y="349">Everything-Free</tspan> <tspan x="100.402" y="376" font-size="14" font-weight="normal">Gluten-Free, Fat-Free, Dairy-Free…</tspan>
            </text>
            <text transform="translate(-14 -36)">
            <tspan x="453.68" y="151.72">Sun-Dried &amp;</tspan> <tspan x="445.85" y="169.72">Tree-Ripened</tspan> <tspan x="429.527" y="193" font-size="14" font-weight="normal">As Mother Nature Intended</tspan>
            </text>
            <text transform="translate(-14 -36)">
            <tspan x="495.55" y="269.72">Non-GMO</tspan> <tspan x="482.839" y="293" font-size="14" font-weight="normal">Non-GMO Certified</tspan>
            </text>
            <text transform="translate(-14 -36)">
            <tspan x="420.1" y="369.72">100% Superfruit</tspan> <tspan x="448.37" y="391" font-size="14" font-weight="normal">Nothing Added</tspan>
            </text>
            <text transform="translate(-14 -36)">
            <tspan x="398.26" y="49.72">Nutrient Rich</tspan> <tspan x="359.687" y="71" font-size="14" font-weight="normal">Antioxidants, Flavonoids, Polyphenols</tspan> <tspan x="376.809" y="89" font-size="14" font-weight="normal">Polysaccharides, Amino Acids,</tspan> <tspan x="406.391" y="107" font-size="14" font-weight="normal">Vitamins &amp; Minerals</tspan>
            </text>
        </g>
        </svg>

    </div>
</section>
<section class="section4">
    <div class="wrap">
        <h2>Eco-friendly &amp; Sustainable</h2>
        <ul>
            <li>No waste</li>
            <li>Little water</li>
            <li>Certified Organic</li>
            <li>California grown</li>
            <li>Sun-ripened</li>
            <li>Hand-picked</li>
        </ul>
        <a class="button" href="/our-orchards">Our Orchards</a> <a class="button" href="/regenerative-ag">Regenerative Ag</a>
    </div>
</section>
<section class="section5">
    <div class="fade">
    <div class="wrap">
        <h2>World’s Ancient Superfruit</h2>
        <p>Literature from 900 BC has documented the jujube fruit sustaining and providing health benefits to people throughout Asia and other parts of the world for thousands of years.</p>
        <a href="/history/" class="button">Discover More</a>
    </div>
    </div>

</section>
</main>

<?php 
}


    //Customised Genesis Footer
    function westridge_genesis_footer() {
    //genesis_structural_wrap( 'site-inner', 'close' );
    //echo '</div>'; //* end .site-inner or #inner
    
    do_action( 'genesis_before_footer' );
    do_action( 'genesis_footer' );
    do_action( 'genesis_after_footer' );
    
    echo '</div>'; //* end .site-container or #wrap
    
    do_action( 'genesis_after' );
    wp_footer(); //* we need this for plugins
    ?>
    </body>
    </html>
    <?php
 }





