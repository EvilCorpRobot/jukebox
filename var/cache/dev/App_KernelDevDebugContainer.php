<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container9ISd3xj\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container9ISd3xj/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container9ISd3xj.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container9ISd3xj\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container9ISd3xj\App_KernelDevDebugContainer([
    'container.build_hash' => '9ISd3xj',
    'container.build_id' => 'c8d34a6d',
    'container.build_time' => 1682602345,
], __DIR__.\DIRECTORY_SEPARATOR.'Container9ISd3xj');