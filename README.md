# dot-toolbox

Add some basic commands to speed up the daily workflow.

### Usage

Some new commands as been added to the `php dot` command.

* make:controller **name** **package**
    * Make a Controller in the specified package

* make:entity **name** **package**
    * Make a Entity in the specified package

* make:factory **name** **package**
    * Make a Factory in the specified package

* make:form **name** **package**
    * Make a Form in the specified package

* make:mapper **name** **package** **table**
    * Make a Mapper in the specified package

* make:service **name** **package**
    * Make a Service in the specified package

To run any of them simply run `php dot <command>`.
DotKernel will take care of the rest, putting the files in the
right directory etc.

The `Package` options corresponds to the DotKernel module to put the file in. (App/User/Console etc.).

### Installation

1) Open up `/config/config.php` and add `\Dot\Toolbox\ConfigProvider::class,` to the `$aggregator` array.

2) That's it, all you have to do now is run `composer dump-autoload` and enjoy access to the new tools, all you have to do is run `php dot`


### Troubleshooting

##### The migrations commands does not show up, what do I do?
If you've follow the installation, but no commands show up, try deleting `/data/config-cache.php` and running `php dot` again.
