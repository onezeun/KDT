CREATE TABLE 테이블이름 ( 
  칼럼명 1 DATATYPE [DEFAULT 형식], 
  칼럼명 2 DATATYPE [DEFAULT 형식], 
  칼럼명 2 DATATYPE [DEFAULT 형식] 
) ;

테이블명 : PLAYER 
테이블 설명 : K-리그 선수들의 정보를 가지고 있는 테이블 
칼럼명 : PLAYER_ID (선수ID) 문자 고정 자릿수 7 자리,
PLAYER_NAME (선수명) 문자 가변 자릿수 20 자리,
TEAM_ID (팀 ID) 문자 고정 자릿수 3 자리,
E_PLAYER_NAME (영문선수명) 문자 가변 자릿수 40 자리,
NICKNAME (선수별명) 문자가변 자릿수 30 자리,
JOIN_YYYY (입단년도) 문자 고정 자릿수 4 자리,
POSITION (포지션) 문자 가변 자릿수10 자리,
BACK_NO (등번호) 숫자 2 자리,
NATION (국적) 문자 가변 자릿수 20 자리,
BIRTH_DATE (생년월일) 날짜,
SOLAR (양/음) 문자 고정 자릿수 1 자리,
HEIGHT (신장) 숫자 3 자리,
WEIGHT (몸무게) 숫자 3 자리, 
제약조건 : 기본키(PRIMARY KEY) → PLAYER_ID (제약조건명은 PLAYER_ID_PK) 값이 반드시 존재 (NOT NULL) → PLAYER_NAME, TEAM_ID

[예제] 

CREATE TABLE PLAYER ( 
  PLAYER_ID CHAR(7) NOT NULL, 
  PLAYER_NAME VARCHAR2(20) NOT NULL, 
  TEAM_ID CHAR(3) NOT NULL, 
  E_PLAYER_NAME VARCHAR2(40), 
  NICKNAME VARCHAR2(30), 
  JOIN_YYYY CHAR(4), 
  POSITION VARCHAR2(10), 
  BACK_NO NUMBER(2), 
  NATION VARCHAR2(20), 
  BIRTH_DATE DATE, 
  SOLAR CHAR(1), 
  HEIGHT NUMBER(3), 
  WEIGHT NUMBER(3), 
  CONSTRAINT PLAYER_PK PRIMARY KEY (PLAYER_ID), 
  CONSTRAINT PLAYER_FK FOREIGN KEY (TEAM_ID) REFERENCES TEAM(TEAM_ID) 
  ); 
  
  테이블이 생성되었다.
[예제] 

CREATE TABLE PLAYER ( 
  PLAYER_ID CHAR(7) NOT NULL, 
  PLAYER_NAME VARCHAR(20) NOT NULL, 
  TEAM_ID CHAR(3) NOT NULL, 
  E_PLAYER_NAME VARCHAR(40), 
  NICKNAME VARCHAR(30), 
  JOIN_YYYY CHAR(4), 
  POSITION VARCHAR(10), 
  BACK_NO TINYINT, 
  NATION VARCHAR(20), 
  BIRTH_DATE DATE, SOLAR CHAR(1), 
  HEIGHT SMALLINT, 
  WEIGHT SMALLINT, 
  CONSTRAINT PLAYER_PK PRIMARY KEY (PLAYER_ID), 
  CONSTRAINT PLAYER_FK FOREIGN KEY (TEAM_ID) REFERENCES TEAM(TEAM_ID) 
  ); 
  
  테이블이 생성되었다.


테이블명 : TEAM 테이블 
설명 : K-리그 선수들의 소속팀에 대한 정보를 가지고 있는 테이블 
칼럼명 : TEAM_ID (팀 고유 ID) 문자 고정 자릿수 3 자리,
REGION_NAME (연고지 명) 문자 가변 자릿수 8 자리,
TEAM_NAME (한글 팀 명) 문자 가변 자릿수 40 자리,
E-TEAM_NAME (영문 팀 명) 문자 가변 자릿수50 자리 ,
ORIG_YYYY (창단년도) 문자 고정 자릿수 4 자리,
STADIUM_ID (구장 고유 ID) 문자 고정 자릿수3 자리,
ZIP_CODE1 (우편번호 앞 3 자리) 문자 고정 자릿수 3 자리,
ZIP_CODE2 (우편번호 뒷 3 자리) 문자 고정 자릿수 3 자리,
ADDRESS (주소) 문자 가변 자릿수 80 자리,
DDD (지역번호) 문자 가변 자릿수 3 자리,
TEL (전화번호) 문자 가변 자릿수 10 자리,
FAX (팩스번호) 문자 가변 자릿수 10 자리,
HOMEPAGE (홈페이지) 문자 가변 자릿수 50 자리 OWNER (구단주) 문자 가변 자릿수 10 자리,
제약조건 : 기본 키(PRIMARY KEY) → TEAM_ID (제약조건명은 TEAM_ID_PK) NOT NULL → REGION_NAME, TEAM_NAME,STADIUM_ID (제약조건명은 미적용)


[예제] 
Oracle CREATE TABLE TEAM ( 
  TEAM_ID CHAR(3) NOT NULL,
  REGION_NAME VARCHAR2(8) NOT NULL,
  TEAM_NAME VARCHAR2(40) NOT NULL,
  E_TEAM_NAME VARCHAR2(50),
  ORIG_YYYY CHAR(4),
  STADIUM_ID CHAR(3) NOT NULL,
  ZIP_CODE1 CHAR(3),
  ZIP_CODE2 CHAR(3),
  ADDRESS VARCHAR2(80),
  DDD VARCHAR2(3),
  TEL VARCHAR2(10),
  FAX VARCHAR2(10),
  HOMEPAGE VARCHAR2(50),
  OWNER VARCHAR2(10),
  CONSTRAINT TEAM_PK PRIMARY KEY (TEAM_ID),
  CONSTRAINT TEAM_FK FOREIGN KEY (STADIUM_ID) REFERENCES STADIUM(STADIUM_ID) 
); 

테이블이생성되었다.

[예제] 
SQL Server CREATE TABLE TEAM ( 
  TEAM_ID CHAR(3) NOT NULL,
  REGION_NAME VARCHAR(8) NOT NULL,
  TEAM_NAME VARCHAR(40) NOT NULL,
  E_TEAM_NAME VARCHAR(50),
  ORIG_YYYY CHAR(4),
  STADIUM_ID CHAR(3) NOT NULL,
  ZIP_CODE1 CHAR(3),
  ZIP_CODE2 CHAR(3),
  ADDRESS VARCHAR(80),
  DDD VARCHAR(3),
  TEL VARCHAR(10),
  FAX VARCHAR(10),
  HOMEPAGE VARCHAR(50),
  OWNER VARCHAR(10),
  CONSTRAINT TEAM_PK PRIMARY KEY (TEAM_ID),
  CONSTRAINT TEAM_FK FOREIGN KEY (STADIUM_ID) REFERENCES STADIUM(STADIUM_ID) 
); 

테이블이생성되었다.

[실행 결과] Oracle DESCRIBE PLAYER; 칼럼 NULL 가능 데이터 유형 ------------------ ------------------------- PLAYER_ID NOT NULL CHAR(7) PLAYER_NAME NOT NULL VARCHAR2(20) 
  TEAM_ID NOT NULL CHAR(3)
  E_PLAYER_NAME VARCHAR2(40)
  NICKNAME VARCHAR2(30)

  JOIN_YYYY CHAR(4)
  POSITION VARCHAR2(10)
  BACK_NO NUMBER(2)
  NATION VARCHAR2(20)

  BIRTH_DATE DATE SOLAR CHAR(1)
  HEIGHT NUMBER(3)
  WEIGHT NUMBER(3)

[실행 결과] SQL Server exec sp_help 'dbo.PLAYER' go 칼럼이름 데이터 유형 길이 NULL 가능 --------------- ------------ ------ -------- PLAYER_ID CHAR(7)
  7 NO PLAYER_NAME VARCHAR(20)

  20 NO TEAM_ID CHAR(3)
  3 NO E_PLAYER_NAME VARCHAR(40)
  40 YES NICKNAME VARCHAR(30)

  30 YES JOIN_YYYY CHAR(4)
  4 YES POSITION VARCHAR(10)
  10 YES BACK_NO TINYINT 1 YES 
  NATION VARCHAR(20)
  20 YES BIRTH_DATE DATE 3 YES SOLAR CHAR(1)
  1 YES HEIGHT SMALLINT 
  2 YES WEIGHT SMALLINT 2 YES
