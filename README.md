### Installation

Place in `app/Plugin/` or better yet, pull as a submodule into your app:

	git submodule add git@github.com:simkimsia/RandomString.git Plugin/RandomString

The above will work if your repo is merely your /app directory.

### Configuration

Wherever you want to use RandomString, place it in the components array for your controller:

	public $components = array('RandomString.RandomString');

Then call it in this manner where you need to generate the string:

	$my_new_string = $this->RandomString->generate();

### Options

Two optional arguments for the `generate` function:

1. length - numeric
	* defaults to 8
2. options - array
	* type - can be: alphanumeric, or all (technicall 'all' can be set as any string _except_ "alphanumeric")
	* case - can be: mixed, lower, or upper