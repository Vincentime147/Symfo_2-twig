https://github.com/Vincentime147/Symfo_2-twig

# [FR]
# si vous avais déjà un environnement Synfony sur votre ordinateur [all terminal]:
git clone https://github.com/Vincentime147/Symfo_2-twig
cd Symfo_2-twig
composer install
symfony serve -d
# Sinon dans un terminal powerShell [powerShell] : 
Set-ExecutionPolicy RemoteSigned -Scope CurrentUser
irm get.scoop.sh | iex
scoop install symfony-cli

# Commande pour démarré ou stopé le serveur de test Symfony [all terminal]: 
symfony serve -d
symfony.exe server:start
symfony.exe server:stop