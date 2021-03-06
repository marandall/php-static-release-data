<?php
	
	use phpdata\Branch\Commands\ModifyDatesCommand;
	use phpdata\Release\Commands\AddAnnouncementCommand;
	use phpdata\Release\Commands\AddSourceCommand;
	use phpdata\Release\Commands\AddTagsConsoleCommand;
	use phpdata\Release\Commands\CreateReleaseCommand;
	use phpdata\Release\Commands\ImportNewsCommand;
	use phpdata\Release\Commands\ImportSourcesCommand;
	use phpdata\Release\Commands\ImportWindowsBuildsCommand;
	use phpdata\Release\Commands\RemoveTagsConsoleCommand;
	use phpdata\Tools\Commands\CompileCommand;
	use Symfony\Component\Console\Application;
	
	if (function_exists('opcache_reset')) {
		opcache_reset();
	}
	
	require_once __DIR__ . '/../lib/vendor/autoload.php';
	
	$app = new Application('PHP Web Data Updater');
	$app->addCommands(
		[
			/* shared release based */
			new CreateReleaseCommand(),
			new ImportWindowsBuildsCommand(),
			new ImportSourcesCommand(),
			new ImportNewsCommand(),
			
			/* modify release */
			new AddAnnouncementCommand(),
			new AddSourceCommand(),
			new AddTagsConsoleCommand(),
			new RemoveTagsConsoleCommand(),
			
			/* modify branch */
			new ModifyDatesCommand(),
			
			/* utility */
			new CompileCommand()
		]
	);
	
	$app->run();