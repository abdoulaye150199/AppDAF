FROM dpage/pgadmin4:latest

# Set default environment variables
ENV PGADMIN_DEFAULT_EMAIL=laye@admin.com
ENV PGADMIN_DEFAULT_PASSWORD=laye123
ENV PGADMIN_CONFIG_ENHANCED_COOKIE_PROTECTION=False
ENV PGADMIN_CONFIG_LOGIN_BANNER="Environnement de production"

# Switch to root to fix permissions
USER root
RUN chown -R pgadmin:root /var/lib/pgadmin && \
    chmod -R 777 /var/lib/pgadmin

# Switch back to pgadmin user
USER pgadmin

EXPOSE 80