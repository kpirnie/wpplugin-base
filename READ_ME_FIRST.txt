KEV'S PLUGIN BASE REPO
======================

Copy this repo to start a new plugin. Everything below is what to touch,
what to leave alone, and how it builds.


LAYOUT
------

    composer.json                   package definition, shipped into distribute
    package.json                    name, version, esbuild, the build script
    build.sh                        the build
    readme.md                       the GitHub-facing readme
    LICENSE                         the repo license
    .gitignore
    .github/workflows/release.yml   builds the installable zip on a tag
    source/                         EVERYTHING you work on lives here
        <slug>.php                  the plugin bootstrap, carries the header
        readme.txt                  the wp.org readme, carries the stable tag
        LICENSE                     the license that ships with the plugin
        uninstall.php               optional
        work/ or src/               your classes
        assets/css/style.css        optional
        assets/js/script.js         optional
    distribute/                     the built plugin, COMMITTED, installable
    vendor/                         composer dependencies, NOT committed


THE RULES
---------

1.  Work in source. Never edit anything in distribute - it is wiped and
    rebuilt in full on every build.

2.  distribute is committed to git. It is what the release zip is made
    from and what a GitHub-based updater installs.

3.  There are no translation files in source. The .pot is generated on
    each build into distribute/languages.

4.  Run WP Plugin Check against distribute, not source. The built tree
    is what ships.

5.  Assets keep their original filenames. The build minifies
    source/assets/css/style.css over the top of
    distribute/assets/css/style.css, so no enqueue in your PHP ever
    needs a .min variant.


STARTING A NEW PLUGIN
---------------------

Replace every placeholder. They are spelled exactly as shown so you can
grep for them:

    PLUGIN_NAME     the human name, eg. Security Header Generator
    PLUGIN_SLUG     the directory and text domain, eg. security-header-generator
    PLUGIN_DESC     the one-line description
    PLUGIN_PREFIX   the constant prefix, eg. WPSH
    PLUGIN_NS       the PHP namespace, eg. KP\SecurityHeaders

Files that contain them:

    composer.json           name, description, support urls
    package.json            name
    readme.md               title, badge urls
    source/PLUGIN_SLUG.php  rename the file, then fill the header
    source/readme.txt       the wp.org header block

Then:

    - set the version in the plugin header, readme.txt Stable tag,
      composer.json and package.json. All four must agree.
    - set your Text Domain in the plugin header. The build reads the
      slug from it, so it has to be right.
    - add your dependencies to composer.json require, and your class
      directories to the autoload block.
    - delete source/assets entirely if the plugin has no CSS or JS.
    - delete the esbuild devDependency from package.json if you deleted
      the assets.


BUILDING
--------

    composer install
    npm install
    ./build.sh

or

    npm run build

The build wipes distribute, verifies the plugin header version against
the readme stable tag, copies the PHP and the supporting files,
minifies the assets over their original filenames, installs the
production vendor tree and its autoloader, drops the lock file, and
generates the .pot with WP-CLI.

It stops on a version mismatch. That check exists because the version
lives in several places - if it fires, fix the file it names rather
than working around it.

WP-CLI must be on PATH. Composer must be on PATH. Node is only needed
if the plugin has assets.


RELEASING
---------

Commit the rebuilt distribute, then tag and push:

    git tag v1.2.3
    git push --tags

The release workflow reads the slug out of the built plugin header,
stages distribute under that directory name, zips it, and publishes the
zip on the tag. Nothing in the workflow is per-plugin - it does not need
editing.

The tag must be v-prefixed and must match the version in the plugin
header, or the zip will be named for a release that does not exist.


WHAT NOT TO EDIT
----------------

    distribute/*        regenerated every build
    distribute/vendor   regenerated every build
    vendor/             local only, not committed
    composer.lock       not committed
    package-lock.json   not committed