"${Technology.Database.MySql.Directory}\bin\mysqladmin.exe" --user=${Technology.Database.Username} --force --password=${Technology.Database.Password} drop ${Technology.Database.Name}
"${Technology.Database.MySql.Directory}\bin\mysqladmin.exe" --user=${Technology.Database.Username} --password=${Technology.Database.Password} create ${Technology.Database.Name}
"${Technology.Database.MySql.Directory}\bin\mysql" --user=${Technology.Database.Username} --password=${Technology.Database.Password} ${Technology.Database.Name}  <Database.sql