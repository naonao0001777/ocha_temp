#使うDockerイメージ
FROM mysql:8.0

#ポートの設定
EXPOSE 4306:3306

#MySQL設定ファイルをコピー
COPY ./mycnf /etc/mysql/conf.d/my.cnf

#docker run時の実行コマンド
CMD ["mysqld"]