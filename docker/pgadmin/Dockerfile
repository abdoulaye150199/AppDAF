FROM dpage/pgadmin4:latest

# Set default environment variables
ENV PGADMIN_DEFAULT_EMAIL=${PGADMIN_DEFAULT_EMAIL:-laye@admin.com}
ENV PGADMIN_DEFAULT_PASSWORD=${PGADMIN_DEFAULT_PASSWORD:-laye123}
ENV PGADMIN_CONFIG_ENHANCED_COOKIE_PROTECTION=False
ENV PGADMIN_CONFIG_LOGIN_BANNER="Environnement de production"

USER pgadmin

# Le port par défaut est 80
EXPOSE 80