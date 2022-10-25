# 1. SQL 명령어(query)종류 및 예시문

## 1. 데이터 조작어(DML, Data Manipulation Language)

데이터베이스에 저장된 데이터를 처리하거나 조회, 검색하기 위한 명령어

| 명령어 | 설명 | 용법 |
| --- | --- | --- |
| SELECT | 데이터베이스 조회, 검색 | SELECT * FROM 테이블명; |
| INSERT | 데이터베이스 삽입 | INSERT INTO 테이블명(컬럼명1,컬럼명2,...) VALUES(값1, 값2, ...); 
INSERT INTO 테이블명 VALUES(값1, 값2, ...); |
| UPDATE | 데이터베이스 수정 | UPDATE 테이블명 SET 컬럼1 = 값1, 컬럼2 = 값2, ... WHERE 조건; |
| DELETE | 데이터베이스 삭제 | DELETE FROM 테이블명; DELETE FROM 테이블명 WHERE 조건; |

## 2. 데이터 정의어(DDL, Data Definition Language)

데이터베이스나 테이블 등을 생성, 삭제하거나 그 구조를 변경하기 위한 명령어

| 명령어 | 설명 | 용법 |
| --- | --- | --- |
| CREATE | 테이블 생성 | CREATE TABLE 테이블명(컬럼명1, 데이터타입1, 컬럼명2, 데이터타입2, ...); |
| ALTER | 테이블 변경 | ALTER TABLE 테이블명 ADD 컬럼명 데이터타입; 
ALTER TABLE 테이블명 DROP COLUMN 컬럼명; 
ALTER TABLE 테이블명 ALTER COLUMN 컬럼명 데이터타입; |
| DROP | 테이블 삭제 | DROP TABLE 테이블명; |
| TRUNCATE | 테이블 데이터베이스 삭제 | TRUNCATE TABLE 테이블명; |

## 3. 트랜잭션 제어어(TCL, Transaction Control Language)

| 명령어 | 설명 | 용법 |
| --- | --- | --- |
| COMMIT | 트랜잭션을 데이터베이스에 적용 | COMMIT; |
| ROLLBACK | 변경된 내용을 취소 | ROLLBACK;  ROLLBACK TO 세이브포인트명; |
| SAVEPOINT | 트랜잭션 시점 표시 | SAVEPOINT 세이브포인트명; |

## 4. 데이터 제어어(DCL, Data Control Language)

데이터베이스에 저장된 데이터를 관리하기 위하여 데이터의 보안성 및 무결성 등을 제어하기 위한 명령어

| 명령어 | 설명 | 용법 |
| --- | --- | --- |
| GRANT | 권한 부여 | ... |
| REVOKE | 권한 회수 | ... |

# 2. MySQL 자료형

## 숫자형

- 정리한 이미지
    
    ![Untitled](KDT%2043%E1%84%8B%E1%85%B5%E1%86%AF%E1%84%8E%E1%85%A1%20%E1%84%80%E1%85%AA%E1%84%8C%E1%85%A6%20e86dd78207f14367a4e284a695787014/Untitled.png)
    

### 1. 정수형

| 타입명 | 저장공간 | 범위 | Unsigned시 범위 |
| --- | --- | --- | --- |
| TINYINT(n) | 1byte | -128 ~ 127 | 0 ~ 255 |
| SMALLINT(n) | 2byte | -32768 ~ 32767 | 0 ~ 65535 |
| MEDIUMINT(n) | 3byte | -8388608 ~ 8388607 | 0 ~ 16777215 |
| INT(n) | 4byte | -2147483648 ~ 2147483647 | 0 ~ 4294967295 |
| BIGINT(n) | 8byte | -9223372036854775808 ~ 9223372036854775807 | 0 ~ 18446744073709551615 |

### 2. 고정 소수점

| 타입명 | 설명 | 표기 방법 |
| --- | --- | --- |
| DECIMAL(길이,소수) | 실수의 값을 정확하게 표현하기 위해 사용 | 소수부의 자릿수를 미리 정해 놓고, 고정된 자릿수로만 소수 부분을 표현하는 방식. 
길이는 65자리까지, 소수부분은 0인 경우 소수를 갖지 않는 특징이 있음. |

### 3. 부동 소수점

| 타입명 | 설명 |
| --- | --- |
| FLOAT(길이,소수) | 부동 소수형 데이터 타입(4byte) |
| DOUBLE(길이,소수) | 부동 소수형 데이터 타입(8byte) |

- DECIMAL은 정확한 수치를 저장하지만 FLOAT, REAL은 근사치 값을 저장
- 대신에 FLOAT, REAL은 더 큰 숫자를 저장할 수 있음
- 부호없는 숫자를 저장할 때에는 UNSIGNED 예약어를 같이 사용

## 문자형

| 자료형 | 설명 | 범위 |
| --- | --- | --- |
| CHAR(n) | 고정 길이를 가지는 문자열을 저장 
CHAR(100) 인 경우 세 자리만 사용해도 나머지 97 자리를 할당.
성능은 CHAR이 VARCHAR보다 더 좋음. | 0 ~ 255 |
| VARCHAR(n) | 가변 길이를 가지는 문자열을 저장 
VARCHAR(100) 인 경우 3글자를 저장하는 경우 
3자리의 데이터 공간만 사용 | 0 ~ 65535 |
| TEXT(n) | 1~65,535 개의 가변 길이를 가지는 문자열을 저장 
문자데이터 저장 | 문자길이+2byte |
| TINYTEXT(n) | 1~255 개의 가변 길이를 가지는 문자열을 저장 | 문자길이+1byte |
| MEDIUMTEXT(n) | 1~16,777,215 개의 가변 길이를 가지는 문자열을 저장 | 문자길이+3byte |
| LONGTEXT(n) | 1~429,496,729 개의 가변 길이를 가지는 문자열을 저장한다. 
최대 4 GB 크기의 TEXT 데이터 값 | 문자길이+4byte |
| BLOB(n) | 1~65,535 개의 가변 길이를 가지는 문자열을 저장 
바이너리 데이터 저장 | 문자길이+2byte |
| TINYBLOB(n) | 1~255 개의 가변 길이를 가지는 문자열을 저장 | 문자길이+1byte |
| MEDIUMBLOB(n) | 1~16,777,215 개의 가변 길이를 가지는 문자열을 저장 | 문자길이+3byte |
| LONGBLOB(n) | 최대 4GB 크기의 BLOB 데이터 값 | 문자길이+4byte |
| ENUM | 문자 형태의 value값을 숫자로 저장 | 255 이하 value는 1byte,  
65535 이하 value는 2byte |
| SET | 비트 연산 열거형 
미리 정의한 집합 안의 요소 중 
여러 개를 동시에 저장할 수 있는 타입 | 최대 64개의 SET 데이터를 포함 |

## 날짜와 시간

| 자료형 | 바이트수 | 설명 | 기본형식 | 저장 범위 |
| --- | --- | --- | --- | --- |
| DATE | 3 | 날짜 저장 타입 | YYYY-MM-DD | '1000-01-01' ~ '9999-12-31' |
| DATETIME | 8 | 날짜와 시간 저장 타입 | YYYY-MM-DD HH:MM:SS | '1000-01-01 00:00:00' ~ '9999-12-31 23:59:59' |
| TIMESTAMP | 4 | 타임스탬프 저장 타입 |  | '1970-01-01 00:00:01' UTC ~ '2038-01-19 03:14:07' UTC |
| TIME | 3 | 시간 저장 타입 | HH:MM:SS | '-838:59:59'~ '838:59:59' |
| YEAR | 1 | 년도 저장 타입 | YYYY | '1901' ~ '2155' |

# 3. MySQL 제약 종류

## 1. **NOT NULL**

해당 필드는 NULL 값을 저장할 수 없음

즉, 이 제약 조건이 설정된 필드는 무조건 데이터를 가지고 있어야 한다.

문법

```sql
CREATE TABLE 테이블이름(
    필드이름 필드타입 NOT NULL,
    ...
)
```

예시

```sql
CREATE TABLE Test (
  ID INT NOT NULL,
  Name VARCHAR(30),
  ReserveDate DATE,
  RoomNum INT
);
```

### **ALTER 문으로 NOT NULL 설정**

테이블에 새로운 필드를 추가할 때

```sql
ALTER TABLE 테이블이름
ADD 필드이름 필드타입 NOT NULL
```

기존 필드에 NOT NULL 제약 조건을 설정할 때

```sql
ALTER TABLE 테이블이름
MODIFY COLUMN 필드이름 필드타입 NOT NULL
```

## 2. **UNIQUE**

해당 필드는 서로 다른 값을 가져야 함

즉, 이 제약 조건이 설정된 필드는 중복된 값을 저장할 수 없다.

### **CREATE 문으로 UNIQUE 설정**

문법

```sql
1. CREATE TABLE 테이블이름 (
    필드명 필드타입 UNIQUE,
    ...
)

2. CREATE TABLE 테이블이름 (
    필드이름 필드타입,
    ...,
    [CONSTRAINT 제약조건이름] UNIQUE (필드이름)
)
```

예시

```sql
CREATE TABLE Test (
  ID INT UNIQUE,
  Name VARCHAR(30),
  ReserveDate DATE,
  RoomNum INT
);
```

### **ALTER 문으로 UNIQUE 설정**

테이블에 새로운 필드를 추가할 때

```sql
1. ALTER TABLE 테이블이름
   ADD 필드이름 필드타입 UNIQUE

2. ALTER TABLE 테이블이름
   ADD [CONSTRAINT 제약조건이름] UNIQUE (필드이름)
```

기존 필드에 UNIQUE 제약 조건을 설정할 때

```sql
1. ALTER TABLE 테이블이름
   MODIFY COLUMN 필드이름 필드타입 UNIQUE

2. ALTER TABLE 테이블이름
   MODIFY COLUMN [CONSTRAINT 제약조건이름] UNIQUE (필드이름)
```

## 3. **PRIMARY KEY**

해당 필드는 NOT NULL과 UNIQUE 제약 조건의 특징을 모두 가진다.

따라서 이 제약 조건이 설정된 필드는 NULL 값을 가질 수 없으며, 또한 중복된 값을 가질 수 없음

이러한 PRIMARY KEY 제약 조건을 **기본 키**라고 함

테이블의 데이터를 쉽고 빠르게 찾도록 도와주는 역할

문법

```sql
1. CREATE TABLE 테이블이름 (
  필드이름 필드타입 PRIMARY KEY,
  ...
)

2. CREATE TABLE 테이블이름(
  필드이름 필드타입,
  ...,
  [CONSTRAINT 제약조건이름] PRIMARY KEY (필드이름)
)
```

예시

```sql
CREATE TABLE Test (
  ID INT PRIMARY KEY,
  Name VARCHAR(30),
  ReserveDate DATE,
  RoomNum INT
);
```

### **ALTER 문으로 PRIMARY KEY 설정**

테이블에 새로운 필드를 추가할 때

```sql
1. ALTER TABLE 테이블이름
   ADD 필드이름 필드타입 PRIMARY KEY

2. ALTER TABLE 테이블이름
   ADD [CONSTRAINT 제약조건이름] PRIMARY KEY (필드이름)
```

기존에 존재하는 필드를 기본 키로 설정할 때

```sql
1. ALTER TABLE 테이블이름
   MODIFY COLUMN 필드이름 필드타입 PRIMARY KEY

2. ALTER TABLE 테이블이름
   MODIFY COLUMN [CONSTRAINT 제약조건이름] PRIMARY KEY (필드이름)
```

## 4. **FOREIGN KEY**

FOREIGN KEY 제약 조건을 설정한 필드를 외래 키라고 부르며, **한 테이블을 다른 테이블과 연결해주는 역할**을 함

외래 키가 설정된 테이블에 레코드를 입력하면, 기준이 되는 테이블의 내용을 참조해서 레코드가 입력된다.

즉, FOREIGN KEY 제약 조건은 하나의 테이블을 다른 테이블에 의존하게 만든다.

FOREIGN KEY를 설정할 때 **참조되는 테이블의 필드는 반드시 UNIQUE나 PRIMARY KEY가 설정되어 있어야 함.**

문법

```sql
CREATE TABLE 테이블이름 (
  필드이름 필드타입,
  ...,
  [CONSTRAINT 제약조건이름]
  FOREIGN KEY (필드이름)
  REFERENCES 테이블이름 (필드이름)
)
```

예시

```sql
CREATE TABLE Test2 (
  ID INT,
  ParentID INT,
  FOREIGN KEY (ParentID)
  REFERENCES Test1(ID) ON UPDATE CASCADE
);
```

### **ALTER 문으로 FOREIGN KEY 설정**

테이블에 새로운 필드를 추가할 때

```sql
ALTER TABLE 테이블이름
ADD [CONSTRAINT 제약조건이름]
FOREIGN KEY (필드이름)
REFERENCES 테이블이름 (필드이름)
```

### **ON DELETE, ON UPDATE**

FOREIGN KEY 제약 조건에 의해 참조되는 테이블에서 데이터의 수정이나 삭제가 발생하면

참조하고 있는 테이블의 데이터도 같이 영향을 받는다.

이때 참조하고 있는 테이블의 동작은 다음 키워드를 사용하여 FOREIGN KEY 제약 조건에서 미리 설정할 수 있음

1. ON DELETE : 참조되는 테이블의 값이 삭제될 경우의 동작을 설정
2. ON UPDATE : 참조되는 테이블의 값이 수정될 경우의 동작을 설정

설정할 수 있는 동작

1. CASCADE : 참조되는 테이블에서 데이터를 삭제하거나 수정하면 참조하는 테이블에서도 삭제와 수정이 같이 이루어짐
2. SET NULL : 참조되는 테이블에서 데이터를 삭제하거나 수정하면 참조하는 테이블의 데이터는 NULL로 변경됨
3. NO ACTION : 참조되는 테이블에서 데이터를 삭제하거나 수정하면 참조하는 테이블의 데이터는 변경되지 않음
4. SET DEFAULT : 참조되는 테이블에서 데이터를 삭제하거나 수정하면 참조하는 테이블의 데이터는 필드의 기본값으로 설정
5. RESTRICT : 참조하는 테이블에 데이터가 남아 있으면 참조되는 테이블의 데이터를 삭제하거나 수정할 수 없음

예제

Test1 테이블의 ID 필드를 Test2 테이블의 ID 필드를 참조하는 외래 키로 설정하는 예제

이때 참조되는 필드의 데이터가 수정될 때는 CASCADE 방식으로, 삭제될 때는 RESTRICT 방식으로 동작함

```sql
CREATE TABLE Test2 (
  ID INT,
  ParentID INT, 
  FOREIGN KEY (ParentID)
  REFERENCES Test1(ID) ON UPDATE CASCADE ON DELETE RESTRICT
);
```

## 5. **DEFAULT**

해당 필드의 기본값을 설정

레코드를 입력할 때 해당 필드 값을 전달하지 않으면, 자동으로 설정된 기본값을 저장

### **CREATE 문으로 DEFAULT 설정**

문법

```sql
CREATE TABLE 테이블이름 (
  필드이름 필드타입 DEFAULT 기본값,
  ...
)
```

예시

```sql
CREATE TABLE Test (
  ID INT,
  Name VARCHAR(30) DEFAULT 'Anonymous',
  ReserveDate DATE,
  RoomNum INT
);
```

### **ALTER 문으로 DEFAULT 설정**

테이블에 새로운 필드를 추가할 때

```sql
ALTER TABLE 테이블이름
ADD 필드이름 필드타입 DEFAULT 기본값
```

기존 필드에 DEFAULT 제약 조건을 설정할 때

```sql
1. ALTER TABLE 테이블이름
   MODIFY COLUMN 필드이름 필드타입 DEFAULT 기본값

2. ALTER TABLE 테이블이름
   ALTER 필드이름 SET DEFAULT 기본값
```