<?php namespace Martel\ModuleL4\Generators;

use Illuminate\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Pluralizer;


class Module{

    protected $template_path;
    /**
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $file;

    protected $config;

    public function __construct(Filesystem $file, $config){
        $this->file = $file;
        $this->config = $config;
        $this->template_path = __DIR__."/templates/";
    }

    public function make($module){
        $module_lc = Pluralizer::singular(strtolower($module));
        $module = ucfirst($module_lc);
        $module_tld = $this->config->get('module-l4::toplevel_directory');

        $path = app_path() ."/$module_tld/$module";
        $module_tld_path = app_path() ."/$module_tld";
        $namespace = "$module_tld\\$module";

        if(!$this->file->exists($module_tld_path)){
            $this->file->makeDirectory($module_tld_path);
        }

        if($this->file->exists($path)){
            return false;
        }

        $this->file->makeDirectory($path);

        $directory_structure = $this->config->get('module-l4::directory_structure');

        foreach ($directory_structure as $directory_name => $file_name) {
            $dir_path = $path . '/' . $directory_name;

            if(!$this->file->exists($dir_path)){
                $this->file->makeDirectory($dir_path);

                if(!empty($file_name)){
                    $cur_namespace = "$namespace\\$directory_name;";

                    $template_file = $this->template_path .'/'. Pluralizer::singular(strtolower($directory_name)) . '.txt';

                    try
                    {
                        $template = $this->file->get($template_file);
                    }
                    catch(FileNotFoundException $e){
                        $template = $this->file->get($this->template_path .'/view.txt');
                    }


                    $template = str_replace('{{Module}}', $module, $template);
                    $template = str_replace('{{module}}', $module_lc, $template);
                    $template = str_replace('{{namespaceName}}', $cur_namespace, $template);

                    $this->file->put($dir_path . '/' . str_replace('{{Module}}', $module, $file_name), $template);
                }
            }
        }

        return true;
    }
}