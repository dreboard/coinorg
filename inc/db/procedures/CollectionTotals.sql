

DELIMITER //
DROP PROCEDURE IF EXISTS CategoryTotalCollectedCoinsByID//
CREATE PROCEDURE CategoryTotalCollectedCoinsByID
(IN category VARCHAR(50), IN id INT)
BEGIN
  -- Collection::getTotalCollectedCoinsByID()
  SELECT COUNT(*) FROM collection
            INNER JOIN coins ON collection.coinID = coins.coinID
            WHERE collection.userID = id AND coins.coinCategory = category;
END//
DELIMITER ;


DELIMITER //
DROP PROCEDURE IF EXISTS UserAllCollectedCoins//
CREATE PROCEDURE UserAllCollectedCoins
  (IN id INT)
  BEGIN
    -- Collection::getCollectionCountById()
    SELECT COUNT(*) FROM collection WHERE userID = id;
  END//
DELIMITER ;



DELIMITER //
DROP PROCEDURE IF EXISTS UserAllUniqueCollectedCoins//
CREATE PROCEDURE UserAllUniqueCollectedCoins
  (IN id INT)
  BEGIN
    -- Collection::getUniqueCollectionCountById()
    SELECT COUNT(DISTINCT coinID) FROM collection WHERE userID = id;
  END//
DELIMITER ;



DELIMITER //
DROP PROCEDURE IF EXISTS UserTypeCollectionProgress//
CREATE PROCEDURE UserTypeCollectionProgress
  (IN id INT,
  IN cat VARCHAR(100))
  BEGIN
    -- Collection::getTypeCollectionProgress()
    SELECT COUNT(*)
    FROM collection
      INNER JOIN coins ON collection.coinID = coins.coinID
    WHERE collection.userID = id AND coins.coinCategory = cat
    LIMIT 1;
  END//
DELIMITER ;



DELIMITER //
DROP PROCEDURE IF EXISTS UserTotalInvestmentSumByCategory//
CREATE PROCEDURE UserTotalInvestmentSumByCategory
  (IN id INT,
   IN cat VARCHAR(100),
  IN purchaseFrom VARCHAR(100))
  BEGIN
    -- Collection::getTotalInvestmentSumByCategoryFrom()
    SELECT COALESCE(sum(purchasePrice), 0.00)
    FROM collection
      INNER JOIN coins ON collection.coinID = coins.coinID
    WHERE collection.userID = id
          AND coins.coinCategory = cat
          AND collection.purchaseFrom = purchaseFrom;
  END//
DELIMITER ;


DELIMITER //
DROP PROCEDURE IF EXISTS UserTotalInvestmentSumByType//
CREATE PROCEDURE UserTotalInvestmentSumByType
  (IN id INT,
   IN type VARCHAR(100)
  )
  BEGIN
    -- Collection::getSumTypeCount()
    SELECT COALESCE(sum(purchasePrice), 0.00)
    FROM collection
      INNER JOIN coins ON collection.coinID = coins.coinID
    WHERE collection.userID = id
          AND coins.coinType = type;
  END//
DELIMITER ;


SELECT COUNT(*) FROM collection
  INNER JOIN coins ON collection.coinID = coins.coinID
WHERE collection.userID = 5 AND collection.design = 'Peace Medal'
