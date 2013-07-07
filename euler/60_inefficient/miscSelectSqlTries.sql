SELECT val
FROM euler.primes
WHERE (val like '3%' OR val like '%3')
AND val between 10000 AND 99999

################# 3 ########################

CREATE temporary table provisionalVals
SELECT p.val FROM 
(
	SELECT val, SUBSTRING(val,2) partStr 
	FROM euler.primes
	WHERE (val like '3%')
	AND val between 100000 AND 999999
) a
INNER JOIN 
(
	SELECT val, SUBSTRING(val,1,LENGTH(val)-1) partStr
	FROM euler.primes
	WHERE (val like '%3')
	AND val between 100000 AND 999999
) b ON a.partStr = b.partStr
INNER JOIN euler.primes p ON p.val = a.partStr
INNER JOIN provisionalVals pv ON pv.val = p.val

################### 7 #####################

DELETE FROM provisionalVals WHERE val NOT IN (
SELECT p.val FROM 
(
	SELECT val, SUBSTRING(val,2) partStr 
	FROM euler.primes
	WHERE (val like '7%')
	AND val between 100000 AND 999999
) a
INNER JOIN 
(
	SELECT val, SUBSTRING(val,1,LENGTH(val)-1) partStr
	FROM euler.primes
	WHERE (val like '%7')
	AND val between 100000 AND 999999
) b ON a.partStr = b.partStr
INNER JOIN euler.primes p ON p.val = a.partStr
INNER JOIN provisionalVals pv ON pv.val = p.val

)

################### 109 ###################

CREATE temporary table provisionalVals 
SELECT p.val FROM 
(
	SELECT val, SUBSTRING(val,4) partStr 
	FROM euler.primes
	WHERE (val like '109%')
	AND val between 10000000 AND 99999999
) a
INNER JOIN 
(
	SELECT val, SUBSTRING(val,1,LENGTH(val)-3) partStr
	FROM euler.primes
	WHERE (val like '%109')
	AND val between 10000000 AND 99999999
) b ON a.partStr = b.partStr
INNER JOIN euler.primes p ON p.val = a.partStr

################### 673 ###################

DELETE p.* FROM provisionalVals p
LEFT JOIN 
(
SELECT p.val FROM 
(
	SELECT val, SUBSTRING(val,4) partStr 
	FROM euler.primes
	WHERE (val like '673%')
	AND val between 100000000 AND 999999999
) a
INNER JOIN 
(
	SELECT val, SUBSTRING(val,1,LENGTH(val)-3) partStr
	FROM euler.primes
	WHERE (val like '%673')
	AND val between 100000000 AND 999999999
) b ON a.partStr = b.partStr
INNER JOIN euler.primes p ON p.val = a.partStr
) a ON a.val = p.val
WHERE a.val IS NULL