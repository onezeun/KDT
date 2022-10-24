-- 기본스키마
CREATE TABLE Reservation(ID INT, Name VARCHAR(30), ReserveDate DATE, RoomNum INT);
CREATE TABLE Customer (ID INT, Name VARCHAR(30), Age INT, Address VARCHAR(20));

INSERT INTO Reservation(ID, Name, ReserveDate, RoomNum) VALUES(1, '홍길동', '2016-01-05', 2014);
INSERT INTO Reservation(ID, Name, ReserveDate, RoomNum) VALUES(2, '임꺽정', '2016-02-12', 918);
INSERT INTO Reservation(ID, Name, ReserveDate, RoomNum) VALUES(3, '장길산', '2016-01-16', 1208);
INSERT INTO Reservation(ID, Name, ReserveDate, RoomNum) VALUES(4, '홍길동', '2016-03-17', 504);

INSERT INTO Customer (ID, Name, Age, Address) VALUES (1, '홍길동', 17, '서울');
INSERT INTO Customer (ID, Name, Age, Address) VALUES (2, '임꺽정', 11, '인천');
INSERT INTO Customer (ID, Name, Age, Address) VALUES (3, '장길산', 13, '서울');
INSERT INTO Customer (ID, Name, Age, Address) VALUES (4, '전우치', 17, '수원');

-- 테이블에 레코드 추가
INSERT INTO Reservation(ID, Name, ReserveDate, RoomNum)
VALUES(5, '이순신', '2016-02-16', 1108);

-- UPDATE 문을 사용하여 레코드의 내용을 수정
UPDATE Reservation
SET RoomNum = 2002
WHERE Name = '홍길동';

-- WHERE 절을 생략하면, 해당 테이블의 모든 레코드의 RoomNum 필드의 값이 2002로 변경
UPDATE Reservation
SET RoomNum = 2002;

-- Name 필드의 값이 '홍길동'인 모든 레코드를 삭제
DELETE FROM Reservation
WHERE Name = '홍길동';

-- 특정 조건의 레코드 선택 WHERE절
SELECT *
FROM Reservation
WHERE Name = '홍길동';

-- ID 값이 3 이하이면서 ReserveDate 필드의 값이 2016년 2월 1일 이후인 레코드만을 선택
SELECT *
FROM Reservation
WHERE ID <= 3 AND ReserveDate > '2016-02-01';

-- 특정 필드만을 선택
SELECT Name, RoomNum
FROM Reservation;

-- 중복되는 값 제거 DISTINCT 키워드
SELECT DISTINCT Name
FROM Reservation;

-- 선택한 결과의 정렬 ORDER BY 절
SELECT * 
FROM Reservation
ORDER BY ReserveDate;

-- 내림차순으로 정렬하고자 할 때는 맨 마지막에 DESC 키워드를 추가
SELECT * 
FROM Reservation
ORDER BY ReserveDate DESC;