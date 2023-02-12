CREATE TABLE IF NOT EXISTS users (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  firstName TEXT ,
  lastName TEXT ,
  username TEXT UNIQUE,
  password TEXT,
  email TEXT,
  verified BOOLEAN,
  tokan TEXT UNIQUE
);
CREATE TABLE IF NOT EXISTS songs(
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  format TEXT,
  fileName TEXT
);
CREATE TABLE IF NOT EXISTS songs_metadata (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  sId INTEGER,
  uploader_id INTEGER,
  title text,
  album text,
  artist text,
  keywoards text,
  private BOOLEAN,
  FOREIGN KEY(sId) REFERENCES songs(id),
  FOREIGN KEY(uploader_id) REFERENCES users(id)
);
CREATE TABLE IF NOT EXISTS playlists(
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  uId INTEGER,
  title CHAR,
  p_id CHAR,
  FOREIGN KEY(uId) REFERENCES users(id)
);
CREATE TABLE IF NOT EXISTS in_playlist(
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  p_id INT,
  songs_id INT,
  FOREIGN KEY(p_id) REFERENCES playlists(id),
  FOREIGN KEY(songs_id) REFERENCES songs(id)
);
