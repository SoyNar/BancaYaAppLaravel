<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-repository {name} {--model=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea una interfaz repository y su implementación';

    /**
     * @var Filesystem
     */
    protected $filesystem;

    /**
     * Constructor del comando.
     */
    public function __construct(Filesystem $filesystem)
    {
        parent::__construct();
        $this->filesystem = $filesystem;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $model = $this->option('model') ?? $name;

        // Validar el nombre del repositorio
        if (!preg_match('/^[A-Za-z]+$/', $name)) {
            $this->error('El nombre del repositorio solo debe contener letras.');
            return;
        }

        $interfacePath = app_path("Interfaces/{$name}Repository.php");
        $classPath = app_path("Repositories/{$name}RepositoryImpl.php");

        // Crear directorios si no existen
        $this->createDirectories();

        // Verificar si los archivos ya existen
        if ($this->filesystem->exists($interfacePath) || $this->filesystem->exists($classPath)) {
            $this->error("El repositorio '{$name}Repository' ya existe.");
            return;
        }

        // Crear la interfaz
        $this->createInterface($name, $interfacePath);

        // Crear la implementación
        $this->createImplementation($name, $model, $classPath);

        $this->info("Repositorio '{$name}Repository' y su implementación creados correctamente.");
    }

    /**
     * Crea los directorios necesarios.
     */
    protected function createDirectories(): void
    {
        $directories = ['Interfaces', 'Repositories'];

        foreach ($directories as $directory) {
            $path = app_path($directory);
            if (!$this->filesystem->isDirectory($path)) {
                $this->filesystem->makeDirectory($path, 0755, true);
            }
        }
    }

    /**
     * Crea el archivo de interfaz.
     */
    protected function createInterface(string $name, string $path): void
    {
        $template = <<<PHP
<?php

namespace App\Interfaces;

use App\Models\\{$name};
use Illuminate\Database\Eloquent\Collection;

interface {$name}Repository
{
    /**
     * Obtiene todos los registros.
     *
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * Encuentra un registro por su ID.
     *
     * @param int \$id
     * @return {$name}|null
     */
    public function findById(int \$id): ?{$name};

    /**
     * Crea un nuevo registro.
     *
     * @param array \$data
     * @return {$name}
     */
    public function create(array \$data): {$name};

    /**
     * Actualiza un registro existente.
     *
     * @param int \$id
     * @param array \$data
     * @return bool
     */
    public function update(int \$id, array \$data): bool;

    /**
     * Elimina un registro.
     *
     * @param int \$id
     * @return bool
     */
    public function delete(int \$id): bool;
}
PHP;
        $this->filesystem->put($path, $template);
    }

    /**
     * Crea el archivo de implementación.
     */
    protected function createImplementation(string $name, string $model, string $path): void
    {
        $template = <<<PHP
<?php

namespace App\Repositories;

use App\Models\\{$model};
use App\Interfaces\\{$name}Repository;
use Illuminate\Database\Eloquent\Collection;

class {$name}RepositoryImpl implements {$name}Repository
{
    /**
     * @var {$model}
     */
    protected \$model;

    /**
     * Constructor.
     *
     * @param {$model} \$model
     */
    public function __construct({$model} \$model)
    {
        \$this->model = \$model;
    }

    /**
     * @inheritDoc
     */
    public function getAll(): Collection
    {
        return \$this->model->all();
    }

    /**
     * @inheritDoc
     */
    public function findById(int \$id): ?{$model}
    {
        return \$this->model->find(\$id);
    }

    /**
     * @inheritDoc
     */
    public function create(array \$data): {$model}
    {
        return \$this->model->create(\$data);
    }

    /**
     * @inheritDoc
     */
    public function update(int \$id, array \$data): bool
    {
        \$model = \$this->findById(\$id);
        if (!\$model) {
            return false;
        }
        return \$model->update(\$data);
    }

    /**
     * @inheritDoc
     */
    public function delete(int \$id): bool
    {
        \$model = \$this->findById(\$id);
        if (!\$model) {
            return false;
        }
        return \$model->delete();
    }
}
PHP;
        $this->filesystem->put($path, $template);
    }
}
