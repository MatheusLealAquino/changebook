FROM bitnami/mariadb:latest
COPY initialize.sql /app/initialize.sql
RUN mysql start & mysql -u root changebook </app/initialize.sql
