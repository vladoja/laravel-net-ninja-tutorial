<#  make.ps1 — simple task runner for Dockerized Laravel

Usage examples:
  .\make.ps1 up
  .\make.ps1 down
  .\make.ps1 restart
  .\make.ps1 ps
  .\make.ps1 logs
  .\make.ps1 bash
  .\make.ps1 artisan "route:list"
  .\make.ps1 composer "require nunomaduro/collision --dev"
  .\make.ps1 migrate
  .\make.ps1 fresh
  .\make.ps1 seed
  .\make.ps1 test
  .\make.ps1 cache:clear
  .\make.ps1 session:db      # create sessions table + migrate
  .\make.ps1 init-laravel    # create Laravel skeleton if empty
  .\make.ps1 psql
#>

param(
    [Parameter(Position = 0)]
    [ValidateSet(
        "up", "build", "down", "restart", "ps", "logs", "bash", "sh",
        "artisan", "composer", "tinker", "keygen",
        "migrate", "fresh", "seed", "test", "cache:clear", "route:list", "optimize",
        "session:db", "cache:db", "psql", "status", "init-laravel", "fix-perms", "web:reload"
    )]
    [string]$Task = "status",

    # Extra args for artisan/composer, e.g. .\make.ps1 artisan "make:model Post -m"
    [string[]]$Args
)

# ---- Config ----
$Project = "td3-laravel-admin"
$Compose = "docker compose -p $Project"
$AppSvc = "app"
$WebSvc = "web"
$DbSvc = "db"

function Run($cmd) {
    Write-Host ">> $cmd" -ForegroundColor Cyan
    iex $cmd
    if ($LASTEXITCODE -ne 0) { exit $LASTEXITCODE }
}

switch ($Task) {
    # --- Docker lifecycle ---
    "up" { Run "$Compose up -d --build" }
    "build" { Run "$Compose build --no-cache" }
    "down" { Run "$Compose down" }
    "restart" { Run "$Compose down"; Run "$Compose up -d --build" }
    "ps" { Run "$Compose ps" }
    "logs" { Run "$Compose logs -f" }
    "web:reload" { Run "$Compose restart $WebSvc" }

    # --- Shells ---
    "bash" { Run "$Compose exec $AppSvc bash" }
    "sh" { Run "$Compose exec $AppSvc sh" }

    # --- Composer / Artisan ---
    "composer" { $arg = ($Args -join ' '); Run "$Compose exec $AppSvc bash -lc 'composer $arg'" }
    "artisan" { $arg = ($Args -join ' '); Run "$Compose exec $AppSvc bash -lc 'php artisan $arg'" }
    "tinker" { Run "$Compose exec $AppSvc bash -lc 'php artisan tinker'" }
    "keygen" { Run "$Compose exec $AppSvc bash -lc 'php artisan key:generate'" }

    # --- Common Laravel tasks ---
    "migrate" { Run "$Compose exec $AppSvc bash -lc 'php artisan migrate'" }
    "fresh" { Run "$Compose exec $AppSvc bash -lc ''php artisan migrate:fresh --seed''" }
    "seed" { Run "$Compose exec $AppSvc bash -lc 'php artisan db:seed'" }
    "test" { Run "$Compose exec $AppSvc bash -lc 'php artisan test'" }
    "cache:clear" { Run "$Compose exec $AppSvc bash -lc 'php artisan config:clear && php artisan cache:clear && php artisan route:clear && php artisan view:clear && php artisan optimize:clear'" }
    "route:list" { Run "$Compose exec $AppSvc bash -lc 'php artisan route:list'" }
    "optimize" { Run "$Compose exec $AppSvc bash -lc 'php artisan optimize'" }

    # --- DB-backed cache/session helpers ---
    "cache:db" {
        Run "$Compose exec $AppSvc bash -lc 'php artisan cache:table'; Run "$Compose exec $AppSvc bash -lc 'php artisan migrate'" }
  "session:db"{ Run "$Compose exec $AppSvc bash -lc 'php artisan session:table'; Run "$Compose exec $AppSvc bash -lc 'php artisan migrate'" 
    }

    # --- Postgres CLI ---
    "psql" { Run "$Compose exec $DbSvc psql -U app -d app" }

    # --- Bootstrap helpers ---
    "init-laravel" {
        Run "$Compose exec $AppSvc bash -lc 'composer create-project laravel/laravel .'"
        Run "$Compose exec $AppSvc bash -lc 'php artisan key:generate'"
        Run "$Compose exec $AppSvc bash -lc 'chmod -R 777 storage bootstrap/cache'"
        Write-Host "Laravel initialized." -ForegroundColor Green
    }
    "fix-perms" {
        Run "$Compose exec $AppSvc bash -lc 'chmod -R 777 storage bootstrap/cache'"
    }

    "status" {
        Run "$Compose ps"
        Write-Host ""
        Write-Host "Available tasks:" -ForegroundColor Green
        @(
            "up, build, down, restart, ps, logs, web:reload",
            "bash, sh",
            "artisan <args>, composer <args>, tinker, keygen",
            "migrate, fresh, seed, test, cache:clear, route:list, optimize",
            "cache:db, session:db, psql",
            "init-laravel, fix-perms"
        ) | ForEach-Object { Write-Host "  $_" }
    }

    default {
        Write-Host "Unknown task: $Task" -ForegroundColor Red
        exit 1
    }
}
