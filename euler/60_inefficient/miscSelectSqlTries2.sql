
CREATE temporary table newProvisionalVals
	SELECT pv.partStr val 
	FROM provisionalVals pv
	INNER JOIN euler.primes p ON p.val = CONCAT(pv.partStr,'673')


	SELECT count(*), pv.val 
	FROM newProvisionalVals pv
	INNER JOIN euler.primes p1 ON p1.val = CONCAT(pv.val,'109')
	INNER JOIN euler.primes p2 ON p2.val = CONCAT('109', pv.val)

	INNER JOIN euler.primes p3 ON p3.val = CONCAT(pv.val,'7')
	INNER JOIN euler.primes p4 ON p4.val = CONCAT('7', pv.val)

	INNER JOIN euler.primes p5 ON p5.val = CONCAT(pv.val,'3')
	INNER JOIN euler.primes p6 ON p6.val = CONCAT('3', pv.val)