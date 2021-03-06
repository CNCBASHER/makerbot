#ifndef PRIMITIVE_TESTS_H
#define PRIMITIVE_TESTS_H

#include <cpptest.h>

class PrimitivesTestSuite : public Test::Suite {
public:
  PrimitivesTestSuite() {
    TEST_ADD(PrimitivesTestSuite::constructionTest);
    TEST_ADD(PrimitivesTestSuite::scalingTest);
  }
private:
  void constructionTest();
  void scalingTest();
};

#endif // PRIMITIVE_TESTS_H
