class Solution:
    def isPalindrome(self, x: int) -> bool:
        self.x=str(x)
        revers="".join(reversed(self.x))
        print((self.x))
        if self.x == revers:
            return True
        else:
            return False

NewClass = Solution()   
print(NewClass.isPalindrome(131))