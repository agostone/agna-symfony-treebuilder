# agna-symfony-treebuilder (OMEGA version, haven't been seriously tested, used so far, documentation is a bit ahead of reality! =))
A TreeBuilder extension making definition modifications possible.

Bundle classes and twig templates, i never had any problem with them when it came to extension. 
Configuration tree descriptors on the other hand, i never succeed. I couldn't help, 
but copy paste the entire treebuilder code just to be able to add for example a simple scalar value.

Therefore i created this little extension which can ease this specific task.

## Installation

Once.

## Usage

### Using with a new bundle
It works the same as the original TreeBuilder class, nothing fancy here.
If you wish to use it in your base bundles, just simply replace the symfony namespace
with the Agna version and that's it.

#### Example
```php
use Agna\Symfony\Component\Config\Definition\Builder\TreeBuilder;

$treeBuilder = new TreeBuilder();
```

### Extending an bundle using the agna-symfony-treebuilder extension
If you wish to extend a bundle using this extension you only need to call the getConfigTreeBuilder
method of the parent calss and that's it. You can easily modify any definition on the 
resulting TreeBuilder instance.

#### Example
```php
$treeBuilder = parent::getConfigTreeBuilder();
$treeBuilder->getRootDefinition()->children()->scalarValue('newOne')->end();
```

### Extending an existing Symfony bundle
If you are facing with a Symfony bundle, first you need to convert the TreeBuilder
instance returned by the parent::getConfigTreeBuilder() call, usingthe TreeBuilderConverter.
After the conversion, you'll be able to modify any part of the configuration definitions.

#### Example
```php
$treeBuilder = parent::getConfigTreeBuilder();
$treeBuilder = TreeBuilderConverterFactory()::factory()->convert($treeBuilder);
$treeBuilder->getRootDefinition()->children()->scalarValue('newOne')->end();
```

or

```php
$treeBuilder = parent::getConfigTreeBuilder();
$treeBuilder = new TreeBuilderConverter()->convert($treeBuilder);
$treeBuilder->getRootDefinition()->children()->scalarValue('newOne')->end();
```

## TODOs
- A more comprehensive unit testing package
- Api documentation
- Better documentation
- More beer

## Licensing
agna-symfony-treebuilder is free software.
It comes without any warranty, to the extent permitted by applicable law.
You can redistribute it and/or modify it under the terms of the 
Do What The Fuck You Want To Public License, Version 2, as published by Sam Hocevar.
See http://www.wtfpl.net/ for more details.
