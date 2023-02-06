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
  aId INTEGER,
  title text,
  keywoards text,
  FOREIGN KEY(sId) REFERENCES songs(id),
  FOREIGN KEY(aId) REFERENCES artists(id)
);
CREATE TABLE IF NOT EXISTS artists(
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  firstName TEXT,
  lastName TEXT,
  nickName TEXT,
  description TEXT
);
CREATE TABLE IF NOT EXISTS playlists(
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  uId INTEGER,
  title CHAR,
  FOREIGN KEY(uId) REFERENCES users(id)
);
