"""A phrase is a palindrome if, after converting all uppercase letters into lowercase letters and removing all non-alphanumeric characters, it reads the same forward and backward. Alphanumeric characters include letters and numbers.

Given a string s, return true if it is a palindrome, or false otherwise."""
import re
class Solution:
    def isPalindrome(self, s: str) -> bool:
        self.s=re.sub(r'[^\w]', '', s.lower())
        self.s=re.sub(r'_', '', self.s)
        NewString=self.s[::-1]
        if NewString == self.s:
            return True
        else:
            return False


NewCLass = Solution()
s="A man, a plan, a canal: Panama"
NewCLass.isPalindrome(s)
