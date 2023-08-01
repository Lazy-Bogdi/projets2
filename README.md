# ProjetS2
 # INSTALLATION DU HUB MERCURE A DES FINS DE TEST

# Lancement du hub dans mercure/windows: 
 $env:MERCURE_PUBLISHER_JWT_KEY='!ChangeThisMercureHubJWTSecretKey!'; $env:MERCURE_SUBSCRIBER_JWT_KEY='!ChangeThisMercureHubJWTSecretKey!'; .\mercure.exe run --config Caddyfile.dev