"""Given an integer array nums and an integer val, remove all occurrences of val in nums in-place. The order of the elements may be changed. Then return the number of elements in nums which are not equal to val.

Consider the number of elements in nums which are not equal to val be k, to get accepted, you need to do the following things:

Change the array nums such that the first k elements of nums contain the elements which are not equal to val. The remaining elements of nums are not important as well as the size of nums.
Return k.
Custom Judg"""

class Solution:
    def removeElement(self, nums, val: int) -> int:
        NewArray = []
        Count = 0
        for i in range(len(nums)):
            if nums[i] != val:
                NewArray.append(nums[i])
                Count += 1
        nums[:] = NewArray  # Actualiza la lista original nums
        return Count

NewClass = Solution()
nums = [3, 2, 2, 3]
print(NewClass.removeElement(nums, 3))  # Output: 2
print(nums)  # Output: [2, 2]